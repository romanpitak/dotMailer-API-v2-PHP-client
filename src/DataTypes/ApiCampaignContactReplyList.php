<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignContactReplyList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiCampaignContactReply';
    }

}
