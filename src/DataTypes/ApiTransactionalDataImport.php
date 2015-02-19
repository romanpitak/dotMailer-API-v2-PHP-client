<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiTransactionalDataImport
 *
 * @property Guid id
 * @property ApiTransactionalDataImportStatuses status
 */
final class ApiTransactionalDataImport extends JsonObject
{

    public function getProperties()
    {
        return array(
            'Id' => 'Guid',
            'Status' => 'ApiTransactionalDataImportStatuses'
        );
    }

}
