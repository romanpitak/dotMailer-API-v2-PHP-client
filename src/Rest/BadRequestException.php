<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\Rest;


class BadRequestException extends Exception
{

    /** @var int */
    protected $code = 400;

}
