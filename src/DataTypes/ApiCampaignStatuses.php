<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignStatuses extends Enum
{
    const UNSENT = 'Unsent';
    const SENDING = 'Sending';
    const SENT = 'Sent';
    const PAUSED = 'Paused';
    const CANCELLED = 'Cancelled';
    const REQUIRES_SYSTEM_APPROVAL = 'RequiresSystemApproval';
    const REQUIRES_SMS_APPROVAL = 'RequiresSMSApproval';
    const REQUIRES_WORKFLOW_APPROVAL = 'RequiresWorkflowApproval';
    const TRIGGERED = 'Triggered';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::UNSENT,
            self::SENDING,
            self::SENT,
            self::PAUSED,
            self::CANCELLED,
            self::REQUIRES_SYSTEM_APPROVAL,
            self::REQUIRES_SMS_APPROVAL,
            self::REQUIRES_WORKFLOW_APPROVAL,
            self::TRIGGERED,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }


}
