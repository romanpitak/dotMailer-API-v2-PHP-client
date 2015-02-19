<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiDependencyList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiDependency';
    }

}
