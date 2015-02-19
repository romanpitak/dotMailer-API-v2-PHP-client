<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

abstract class MagicArray implements \ArrayAccess, \Iterator, IDataType
{

    /** @var IDataType[] */
    protected $data = array();


    public function __construct($value = null)
    {
        // if value is supplied
        if (!is_null($value)) {
            if (!is_array($value)) { // convert to array
                if (!is_string($value)) { // convert to string
                    $value = (string)$value;
                }
                $value = json_decode($value, true, 512, JSON_BIGINT_AS_STRING);
            }
            // assign
            if (!is_null($value)) {
                foreach ($value as $key => $val) {
                    $this[$key] = $val;
                }
            }
        }
    }

    /**
     * @param $offset
     * @throws InvalidOffsetException
     */
    private function checkOffset($offset)
    {
        if (!$this->offsetIsAllowed($offset)) {
            throw new InvalidOffsetException($offset);
        }
    }


    /*
     * ========== Abstract ==========
     */

    /**
     * @param string $offset
     * @return bool
     */
    abstract protected function offsetIsAllowed($offset);

    /**
     * Convert the offset to the correct data type and style
     *
     * @param mixed $offset
     * @return mixed
     */
    abstract protected function convertOffset($offset);

    /**
     * @param mixed $value
     * @param mixed $offset
     * @return mixed
     */
    abstract protected function convertValue($value, $offset);


    /*
     * ========== IDataType ==========
     */

    function toArray()
    {
        $data = $this->data;
        foreach ($data as $key => $value) {
            $data[$key] = $value->toArray();
        }
        return $data;
    }

    function __toString()
    {
        return $this->toJson();
    }

    /*
     * ========== ArrayAccess ==========
     */

    function offsetExists($offset)
    {
        $offset = $this->convertOffset($offset);
        $this->checkOffset($offset);
        return isset($this->data[$offset]);
    }

    function offsetGet($offset)
    {
        $offset = $this->convertOffset($offset);
        $this->checkOffset($offset);
        return $this->data[$offset];
    }

    function offsetSet($offset, $value)
    {
        $offset = $this->convertOffset($offset);
        $this->checkOffset($offset);
        if (is_null($offset)) {
            $this->data[] = $this->convertValue($value, $offset);
        } else {
            $this->data[$offset] = $this->convertValue($value, $offset);
        }
    }

    function offsetUnset($offset)
    {
        $offset = $this->convertOffset($offset);
        $this->checkOffset($offset);
        unset($this->data[$offset]);
    }


    /*
     * ========== Iterator ==========
     */

    public function current()
    {
        return current($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function valid()
    {
        return isset($this->data[$this->key()]);
    }


}
