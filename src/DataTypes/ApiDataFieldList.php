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

    protected function getDataClass()
    {
        return 'ApiDataField';
    }

}
