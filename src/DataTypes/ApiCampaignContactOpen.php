<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignContactOpen
 *
 * @property XsInt ContactId
 * @property XsString email
 * @property XsString MailClient
 * @property XsString MailClientVersion
 * @property XsString IpAddress
 * @property XsString UserAgent
 * @property XsBoolean IsHtml
 * @property XsBoolean IsForward
 * @property XsDateTime DateOpened
 *
 */
final class ApiCampaignContactOpen extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'MailClient' => 'XsString',
            'MailClientVersion' => 'XsString',
            'IpAddress' => 'XsString',
            'UserAgent' => 'XsString',
            'IsHtml' => 'XsBoolean',
            'IsForward' => 'XsBoolean',
            'DateOpened' => 'XsDateTime',
        );
    }

}
