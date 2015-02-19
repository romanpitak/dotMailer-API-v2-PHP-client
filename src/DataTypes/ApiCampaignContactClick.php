<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignContactClick
 *
 * @property XsInt contactId
 * @property XsString email
 * @property XsString url
 * @property XsString ipAddress
 * @property XsString userAgent
 * @property XsDateTime dateClicked
 * @property XsString keyword
 *
 */
final class ApiCampaignContactClick extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'Url' => 'XsString',
            'IpAddress' => 'XsString',
            'UserAgent' => 'XsString',
            'DateClicked' => 'XsDateTime',
            'Keyword' => 'XsString'
        );
    }

}
