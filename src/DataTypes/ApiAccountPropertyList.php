<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiAccountPropertyList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiAccountProperty';
    }

}
