<?php
/**
 *
 *
 * @author Steven Jones <steven.jones@computerminds.co.uk>
 *
 */


namespace DotMailer\Api\DataTypes;

final class ApiPersonalizationValue extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Name' => 'XsString',
            'Value' => 'XsString',
        );
    }

}
