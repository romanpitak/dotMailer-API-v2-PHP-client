<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiContactData
 *
 * @property XsString key
 * @property Mixed value
 *
 */
final class ApiContactData extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Key' => 'XsString',
            'Value' => 'Mixed'
        );
    }

}
