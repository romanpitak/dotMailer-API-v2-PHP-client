<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


class InvalidOffsetException extends Exception
{
    /**
     * @param string $offset
     */
    public function __construct($offset)
    {
        $this->message = sprintf('Offset "%s" not allowed!', $offset);
    }
}
