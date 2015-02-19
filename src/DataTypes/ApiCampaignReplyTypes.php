<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignReplyTypes extends Enum
{

    const REPLY = 'Reply';
    const AUTO_REPLY = 'AutoReply';
    const CHALLENGE_RESPONSE = 'ChallengeResponse';
    const UNSAFE = 'Unsafe';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::REPLY,
            self::AUTO_REPLY,
            self::CHALLENGE_RESPONSE,
            self::UNSAFE,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
