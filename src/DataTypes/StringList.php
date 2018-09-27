<?php
/**
 *
 *
 * @author Steven Jones <steven.jones@computerminds.co.uk>
 *
 */


namespace DotMailer\Api\DataTypes;

final class StringList extends JsonArray
{

    protected function getDataClass()
    {
       return 'XsString';
    }

}