<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiAddressBookList extends JsonArray
{

    function getDataClass()
    {
        return 'ApiAddressBook';
    }

}
