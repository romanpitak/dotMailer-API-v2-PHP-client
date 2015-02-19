<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class Guid implements IDataType
{

    /** @var string */
    private $value;

    public function __construct($value)
    {

        $pattern = '/[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}/';
        if (1 !== preg_match($pattern, $value)) {
            throw new InvalidValueException();
        }

        $this->value = $value;
    }

    /*
     * ========== IDataType ==========
     */

    public function __toString()
    {
        return (string)$this->value;
    }

    public function toArray()
    {
        return (string)$this;
    }

    public function toJson()
    {
        return json_encode($this->value);
    }
}
