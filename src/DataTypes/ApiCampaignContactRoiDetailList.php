<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignContactRoiDetailList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiCampaignContactRoiDetail';
    }

}
