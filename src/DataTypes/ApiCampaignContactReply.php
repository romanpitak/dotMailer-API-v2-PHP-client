<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignContactReply
 *
 * @property XsInt contactId
 * @property XsString email
 * @property XsString fromAddress
 * @property XsString toAddress
 * @property XsString subject
 * @property XsString message
 * @property XsBoolean isHtml
 * @property XsDateTime dateReplied
 * @property ApiCampaignReplyTypes replyType
 */
final class ApiCampaignContactReply extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'FromAddress' => 'XsString',
            'ToAddress' => 'XsString',
            'Subject' => 'XsString',
            'Message' => 'XsString',
            'IsHtml' => 'XsBoolean',
            'DateReplied' => 'XsDateTime',
            'ReplyType' => 'ApiCampaignReplyTypes'
        );
    }
}
