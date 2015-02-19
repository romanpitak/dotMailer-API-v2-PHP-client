<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiTransactionalData
 *
 * @property XsString key
 * @property XsString ContactIdentifier
 * @property XsString Json
 */
final class ApiTransactionalData extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Key' => 'XsString',
            'ContactIdentifier' => 'XsString',
            'Json' => 'XsString',
        );
    }

}
