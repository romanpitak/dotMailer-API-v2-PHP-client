<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class XsBoolean implements IDataType
{

    private $value;

    public function __construct($value)
    {
        if ((true === $value) || ('true' === (string)$value)) {
            $this->value = true;
        } elseif ((false === $value) || ('false' === (string)$value)) {
            $this->value = false;
        } else {
            throw new InvalidValueException();
        }
    }

    public function toJson()
    {
        return ($this->value ? 'true' : 'false');
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
