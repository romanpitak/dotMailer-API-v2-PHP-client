<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignContactPageViewList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiCampaignContactPageView';
    }

}
