<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiSegmentRefreshStatuses extends Enum
{

    const NOT_STARTED = 'NotStarted';
    const NOT_FINISHED = 'NotFinished';
    const FINISHED = 'Finished';
    const FAILED = 'Failed';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::NOT_STARTED,
            self::NOT_FINISHED,
            self::FINISHED,
            self::FAILED,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
