<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class XsInt implements IDataType
{

    private $value;

    public function __construct($value)
    {
        if (is_int($value) || (((string)(int)$value) == $value)) {
            $this->value = $value;
        } else {
            throw new InvalidValueException();
        }
    }

    public function toJson()
    {
        return (string)$this->value;
    }

    public function __toString()
    {
        return (string)$this->toJson();
    }

    public function toArray()
    {
        return $this->toJson();
    }

}
