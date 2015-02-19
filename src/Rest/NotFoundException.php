<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\Rest;


class NotFoundException extends Exception
{

    /** @var int */
    protected $code = 404;

}
