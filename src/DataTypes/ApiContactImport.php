<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiContactImport
 *
 * @property Guid id
 * @property ApiContactImportStatuses status
 */
final class ApiContactImport extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'Guid',
            'Status' => 'ApiContactImportStatuses'
        );
    }

}
