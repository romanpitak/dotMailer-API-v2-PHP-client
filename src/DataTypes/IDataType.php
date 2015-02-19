<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

interface IDataType
{

    /**
     * @return string
     */
    public function __toString();

    /**
     * @return array
     */
    public function toArray();

    /**
     * @return string
     */
    public function toJson();

}
