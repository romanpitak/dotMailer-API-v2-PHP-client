<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

abstract class Enum implements IDataType
{

    /** @var IDataType */
    protected $value;

    public function __construct($value)
    {
        $valueClass = __NAMESPACE__ . '\\' . $this->getDataClass();
        $this->value = new $valueClass($value);
        if (!in_array($this->value, $this->getPossibleValues(), false)) {
            throw new InvalidValueException('Invalid value');
        }
    }

    /*
     * ========== Abstract ==========
     */

    /**
     * Get data class name
     *
     * @return string Data class name
     */
    abstract protected function getDataClass();

    /**
     * Return an array of possible enum values
     *
     * @return array
     */
    abstract protected function getPossibleValues();

    /*
     * ========== IDataTypes ==========
     */

    public function __toString()
    {
        return (string)$this->value;
    }

    public function toArray()
    {
        return $this->value->toArray();
    }

    public function toJson()
    {
        return $this->value->toJson();
    }

}
