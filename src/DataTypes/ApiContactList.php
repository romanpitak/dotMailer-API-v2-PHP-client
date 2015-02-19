<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiContact';
    }

}
