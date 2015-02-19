<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiTransactionalDataImportReport
 *
 * @property XsInt totalItems
 * @property XsInt totalImported
 * @property XsInt totalRejected
 * @property ApiTransactionalDataImportReportFaultList faults
 */
final class ApiTransactionalDataImportReport extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'TotalItems' => 'XsInt',
            'TotalImported' => 'XsInt',
            'TotalRejected' => 'XsInt',
            'Faults' => 'ApiTransactionalDataImportReportFaultList'
        );
    }

}
