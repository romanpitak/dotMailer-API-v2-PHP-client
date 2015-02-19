<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiSegment
 *
 * @property XsInt id
 * @property XsString name
 * @property XsInt contacts
 */
final class ApiSegment extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Contacts' => 'XsInt'
        );
    }

}
