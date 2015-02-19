<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

final class ApiDataFieldList extends JsonArray
{

    function getDataClass()
    {
        return 'ApiDataField';
    }

}
