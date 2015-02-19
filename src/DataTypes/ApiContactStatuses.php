<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactStatuses extends Enum
{

    const SUBSCRIBED = 'Subscribed';
    const UNSUBSCRIBED = 'Unsubscribed';
    const SOFT_BOUNCED = 'SoftBounced';
    const HARD_BOUNCED = 'HardBounced';
    const ISP_COMPLAINED = 'IspComplained';
    const MAIL_BLOCKED = 'MailBlocked';
    const PENDING_OPT_IN = 'PendingOptIn';
    const DIRECT_COMPLAINT = 'DirectComplaint';
    const DELETED = 'Deleted';
    const SHARED_SUPPRESSION = 'SharedSuppression';
    const SUPPRESSED = 'Suppressed';
    const NOT_ALLOWED = 'NotAllowed';
    const DOMAIN_SUPPRESSION = 'DomainSuppression';
    const NO_MX_RECORD = 'NoMxRecord';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::SUBSCRIBED,
            self::UNSUBSCRIBED,
            self::SOFT_BOUNCED,
            self::HARD_BOUNCED,
            self::ISP_COMPLAINED,
            self::MAIL_BLOCKED,
            self::PENDING_OPT_IN,
            self::DIRECT_COMPLAINT,
            self::DELETED,
            self::SHARED_SUPPRESSION,
            self::SUPPRESSED,
            self::NOT_ALLOWED,
            self::DOMAIN_SUPPRESSION,
            self::NO_MX_RECORD,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
