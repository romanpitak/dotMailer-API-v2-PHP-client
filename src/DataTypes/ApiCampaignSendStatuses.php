<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignSendStatuses extends Enum
{

    const NOT_SENT = 'NotSent';
    const SCHEDULED = 'Scheduled';
    const SENDING = 'Sending';
    const SENT = 'Sent';
    const CANCELLED = 'Cancelled';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::NOT_SENT,
            self::SCHEDULED,
            self::SENDING,
            self::SENT,
            self::CANCELLED,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
