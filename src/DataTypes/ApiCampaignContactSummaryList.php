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

    function getDataClass()
    {
        return 'ApiCampaignContactSummary';
    }

}
