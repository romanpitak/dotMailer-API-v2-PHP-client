<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiAccountProperty
 *
 * @property XsString name
 * @property XsString type
 * @property XsString value
 */
final class ApiAccountProperty extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Name' => 'XsString',
            'Type' => 'XsString',
            'Value' => 'XsString',
        );
    }

}
