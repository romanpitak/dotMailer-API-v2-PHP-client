<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiTransactionalDataImportReportFaultList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiTransactionalDataImportReportFault';
    }

}
