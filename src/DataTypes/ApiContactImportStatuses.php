<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactImportStatuses extends Enum
{

    const FINISHED = 'Finished';
    const NOT_FINISHED = 'NotFinished';
    const REJECTED_BY_WATCHDOG = 'RejectedByWatchdog';
    const INVALID_FILE_FORMAT = 'InvalidFileFormat';
    const UNKNOWN = 'Unknown';
    const FAILED = 'Failed';
    const EXCEEDS_ALLOWED_CONTACT_LIMIT = 'ExceedsAllowedContactLimit';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::FINISHED,
            self::NOT_FINISHED,
            self::REJECTED_BY_WATCHDOG,
            self::INVALID_FILE_FORMAT,
            self::UNKNOWN,
            self::FAILED,
            self::EXCEEDS_ALLOWED_CONTACT_LIMIT,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
