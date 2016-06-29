<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

abstract class JsonObject extends MagicArray
{

    /** @var array */
    protected $classes;

    /** @var array */
    protected $outputKeys;

    public function __construct($value = null)
    {

        foreach ($this->getProperties() as $key => $val) {
            $offset = $this->convertOffset($key);
            $this->classes[$offset] = __NAMESPACE__ . '\\' . $val;
            $this->outputKeys[$offset] = $key;
        }

        parent::__construct($value);
    }

    /*
     * ========== Abstract ==========
     */

    /**
     * Returns array of magic properties in format "CamelCasePropertyName" => "DataClass"
     *
     * @return array
     */
    abstract protected function getProperties();

    /*
     * ========== MagicArray ==========
     */

    protected function offsetIsAllowed($offset)
    {
        return (bool)array_key_exists($this->convertOffset($offset), $this->classes);
    }

    protected function convertOffset($offset)
    {
        return strtolower($offset);
    }

    protected function convertValue($value, $offset)
    {
        if (is_null($value)) {
            return new NullDataType();
        }
        $convertedOffset = $this->convertOffset($offset);
        $dataClass = $this->classes[$convertedOffset];
        $convertedValue = new $dataClass($value);
        return $convertedValue;
    }


    /*
     * ========== IDataType ==========
     */

    public function toJson()
    {
        $contents = array();
        foreach ($this->data as $key => $value) {
            $outputKey = $this->outputKeys[$key];
            $contents[] = sprintf('"%s":%s', $outputKey, $value->toJson());
        }
        return sprintf("{%s}", implode(",", $contents));
    }


    /*
     * ========== Magic ==========
     */

    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

}
