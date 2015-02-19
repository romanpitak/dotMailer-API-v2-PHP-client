<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiAccount
 *
 * @property XsInt id
 * @property ApiAccountPropertyList properties
 */
final class ApiAccount extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Properties' => 'ApiAccountPropertyList'
        );
    }

}
