<?php
/**
 *
 *
 * @author Steven Jones <steven.jones@computerminds.co.uk>
 *
 */


namespace DotMailer\Api\DataTypes;

final class ApiPersonalizationValueList extends JsonArray
{

    protected function getDataClass()
    {
       return 'ApiPersonalizationValue';
    }

}
