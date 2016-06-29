<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

class NullDataType implements IDataType
{

    public function toJson()
    {
        return 'null';
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function toArray()
    {
        return $this->toJson();
    }

}
