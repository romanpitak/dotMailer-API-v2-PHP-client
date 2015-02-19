<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignContactSummaryList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiCampaignContactSummary';
    }

}
