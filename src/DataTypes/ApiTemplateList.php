<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

final class ApiTemplateList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiTemplate';
    }

}
