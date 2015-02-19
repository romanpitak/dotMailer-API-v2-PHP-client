<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiCampaignContactSocialBookmarkViewList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiCampaignContactSocialBookmarkView';
    }

}
