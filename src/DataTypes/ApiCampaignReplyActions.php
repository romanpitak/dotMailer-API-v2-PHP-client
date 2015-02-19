<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignReplyActions extends Enum
{

    const NOT_SET = 'Unset';
    const WEB_MAIL_FORWARD = 'WebMailForward';
    const WEB_MAIL = 'Webmail';
    const DELETE = 'Delete';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::NOT_SET,
            self::WEB_MAIL_FORWARD,
            self::WEB_MAIL,
            self::DELETE,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
