<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiCampaignContactSocialBookmarkView
 *
 * @property XsInt contactId
 * @property XsString email
 * @property XsString bookmarkName
 * @property XsInt numViews
 */
final class ApiCampaignContactSocialBookmarkView extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'BookmarkName' => 'XsString',
            'NumViews' => 'XsInt',
        );
    }

}
