<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiTransactionalDataImportReportFault
 *
 * @property XsString key
 * @property ApiTransactionalDataImportFaultReason reason
 */
final class ApiTransactionalDataImportReportFault extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Key' => 'XsString',
            'Reason' => 'ApiTransactionalDataImportFaultReason'
        );
    }

}
