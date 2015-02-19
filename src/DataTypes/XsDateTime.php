<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class XsDateTime implements IDataType
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
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
