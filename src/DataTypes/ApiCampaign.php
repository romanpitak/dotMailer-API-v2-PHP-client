<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiCampaign
 *
 * @property XsInt id
 * @property XsString name
 * @property XsString subject
 * @property XsString fromName
 * @property ApiCampaignFromAddress fromAddress
 * @property XsString htmlContent
 * @property XsString plainTextContent
 * @property ApiCampaignReplyActions replyAction
 * @property XsString replyToAddress
 * @property XsBoolean isSplitTest
 * @property ApiCampaignStatuses status
 */
final class ApiCampaign extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Subject' => 'XsString',
            'FromName' => 'XsString',
            'FromAddress' => 'ApiCampaignFromAddress',
            'HtmlContent' => 'XsString',
            'PlainTextContent' => 'XsString',
            'ReplyAction' => 'ApiCampaignReplyActions',
            'ReplyToAddress' => 'XsString',
            'IsSplitTest' => 'XsBoolean',
            'Status' => 'ApiCampaignStatuses',
        );
    }

}
