<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignSummary
 *
 * @property XsDateTime DateSent
 * @property XsInt NumUniqueOpens
 * @property XsInt NumUniqueTextOpens
 * @property XsInt NumTotalUniqueOpens
 * @property XsInt NumOpens
 * @property XsInt NumTextOpens
 * @property XsInt NumTotalOpens
 * @property XsInt NumClicks
 * @property XsInt NumTextClicks
 * @property XsInt NumTotalClicks
 * @property XsInt NumPageViews
 * @property XsInt NumTotalPageViews
 * @property XsInt NumTextPageViews
 * @property XsInt NumForwards
 * @property XsInt NumTextForwards
 * @property XsInt NumEstimatedForwards
 * @property XsInt NumTextEstimatedForwards
 * @property XsInt NumTotalEstimatedForwards
 * @property XsInt NumReplies
 * @property XsInt NumTextReplies
 * @property XsInt NumTotalReplies
 * @property XsInt NumHardBounces
 * @property XsInt NumTextHardBounces
 * @property XsInt NumTotalHardBounces
 * @property XsInt NumSoftBounces
 * @property XsInt NumTextSoftBounces
 * @property XsInt NumTotalSoftBounces
 * @property XsInt NumUnsubscribes
 * @property XsInt NumTextUnsubscribes
 * @property XsInt NumTotalUnsubscribes
 * @property XsInt NumIspComplaints
 * @property XsInt NumTextIspComplaints
 * @property XsInt NumTotalIspComplaints
 * @property XsInt NumMailBlocks
 * @property XsInt NumTextMailBlocks
 * @property XsInt NumTotalMailBlocks
 * @property XsInt NumSent
 * @property XsInt NumTextSent
 * @property XsInt NumTotalSent
 * @property XsInt NumRecipientsClicked
 * @property XsInt NumDelivered
 * @property XsInt NumTextDelivered
 * @property XsInt NumTotalDelivered
 * @property XsDouble PercentageDelivered
 * @property XsDouble PercentageUniqueOpens
 * @property XsDouble PercentageOpens
 * @property XsDouble PercentageUnsubscribes
 * @property XsDouble PercentageReplies
 * @property XsDouble PercentageHardBounces
 * @property XsDouble PercentageSoftBounces
 * @property XsDouble PercentageUsersClicked
 * @property XsDouble PercentageClicksToOpens
 */
final class ApiCampaignSummary extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'DateSent' => 'XsDateTime',
            'NumUniqueOpens' => 'XsInt',
            'NumUniqueTextOpens' => 'XsInt',
            'NumTotalUniqueOpens' => 'XsInt',
            'NumOpens' => 'XsInt',
            'NumTextOpens' => 'XsInt',
            'NumTotalOpens' => 'XsInt',
            'NumClicks' => 'XsInt',
            'NumTextClicks' => 'XsInt',
            'NumTotalClicks' => 'XsInt',
            'NumPageViews' => 'XsInt',
            'NumTotalPageViews' => 'XsInt',
            'NumTextPageViews' => 'XsInt',
            'NumForwards' => 'XsInt',
            'NumTextForwards' => 'XsInt',
            'NumEstimatedForwards' => 'XsInt',
            'NumTextEstimatedForwards' => 'XsInt',
            'NumTotalEstimatedForwards' => 'XsInt',
            'NumReplies' => 'XsInt',
            'NumTextReplies' => 'XsInt',
            'NumTotalReplies' => 'XsInt',
            'NumHardBounces' => 'XsInt',
            'NumTextHardBounces' => 'XsInt',
            'NumTotalHardBounces' => 'XsInt',
            'NumSoftBounces' => 'XsInt',
            'NumTextSoftBounces' => 'XsInt',
            'NumTotalSoftBounces' => 'XsInt',
            'NumUnsubscribes' => 'XsInt',
            'NumTextUnsubscribes' => 'XsInt',
            'NumTotalUnsubscribes' => 'XsInt',
            'NumIspComplaints' => 'XsInt',
            'NumTextIspComplaints' => 'XsInt',
            'NumTotalIspComplaints' => 'XsInt',
            'NumMailBlocks' => 'XsInt',
            'NumTextMailBlocks' => 'XsInt',
            'NumTotalMailBlocks' => 'XsInt',
            'NumSent' => 'XsInt',
            'NumTextSent' => 'XsInt',
            'NumTotalSent' => 'XsInt',
            'NumRecipientsClicked' => 'XsInt',
            'NumDelivered' => 'XsInt',
            'NumTextDelivered' => 'XsInt',
            'NumTotalDelivered' => 'XsInt',
            'PercentageDelivered' => 'XsDouble',
            'PercentageUniqueOpens' => 'XsDouble',
            'PercentageOpens' => 'XsDouble',
            'PercentageUnsubscribes' => 'XsDouble',
            'PercentageReplies' => 'XsDouble',
            'PercentageHardBounces' => 'XsDouble',
            'PercentageSoftBounces' => 'XsDouble',
            'PercentageUsersClicked' => 'XsDouble',
            'PercentageClicksToOpens' => 'XsDouble'
        );
    }

}
