<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactDataList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiContactData';
    }

}
