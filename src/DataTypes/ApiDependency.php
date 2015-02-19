<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiDependency
 *
 * @property ApiBusinessObjectType type
 * @property XsInt objectId
 */
final class ApiDependency extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Type' => 'ApiBusinessObjectType',
            'ObjectId' => 'XsInt'
        );
    }

}
