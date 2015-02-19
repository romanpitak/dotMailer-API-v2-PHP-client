<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignContactSummary
 *
 * @property XsInt contactId
 * @property XsString email
 * @property XsInt numOpens
 * @property XsInt numPageViews
 * @property XsInt numClicks
 * @property XsInt numForwards
 * @property XsInt numEstimatedForwards
 * @property XsInt numReplies
 * @property XsDateTime dateSent
 * @property XsDateTime dateFirstOpened
 * @property XsDateTime dateLastOpened
 * @property XsString firstOpenIp
 * @property XsBoolean unsubscribed
 * @property XsBoolean softBounced
 * @property XsBoolean hardBounced
 *
 */
final class ApiCampaignContactSummary extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'NumOpens' => 'XsInt',
            'NumPageViews' => 'XsInt',
            'NumClicks' => 'XsInt',
            'NumForwards' => 'XsInt',
            'NumEstimatedForwards' => 'XsInt',
            'NumReplies' => 'XsInt',
            'DateSent' => 'XsDateTime',
            'DateFirstOpened' => 'XsDateTime',
            'DateLastOpened' => 'XsDateTime',
            'FirstOpenIp' => 'XsString',
            'Unsubscribed' => 'XsBoolean',
            'SoftBounced' => 'XsBoolean',
            'HardBounced' => 'XsBoolean'
        );
    }

}
