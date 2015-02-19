<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiAddressBook
 *
 * @property XsInt id
 * @property XsString name
 * @property ApiAddressBookVisibility visibility
 * @property XsInt contacts
 */
final class ApiAddressBook extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Visibility' => 'ApiAddressBookVisibility',
            'Contacts' => 'XsInt'
        );
    }

}
