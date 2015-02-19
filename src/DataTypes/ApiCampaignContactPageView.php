<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignContactPageView
 *
 * @property XsInt contactId
 * @property XsString email
 * @property XsString url
 * @property XsDateTime dateViewed
 */
final class ApiCampaignContactPageView extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'Url' => 'XsString',
            'DateViewed' => 'XsDateTime',
        );
    }

}
