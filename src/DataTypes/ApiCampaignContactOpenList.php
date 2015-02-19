<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignContactOpenList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiCampaignContactOpen';
    }

}
