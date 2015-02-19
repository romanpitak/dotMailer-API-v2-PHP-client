<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiTemplate extends JsonObject implements IApiTemplate
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Subject' => 'XsString',
            'FromName' => 'XsString',
            'HtmlContent' => 'XsString',
            'PlainTextContent' => 'XsString',
            'ReplyAction' => 'ApiCampaignReplyActions',
            'ReplyToAddress' => 'XsString',
        );
    }

}
