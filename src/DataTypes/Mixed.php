<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

class Mixed implements IDataType
{

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function toArray()
    {
        return (array)$this->value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }

    public function toJson()
    {
        return json_encode($this->value);
    }

}
