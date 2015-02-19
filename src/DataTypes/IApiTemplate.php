<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IApiTemplate
 *
 * @property XsInt id
 * @property XsString name
 * @property XsString subject
 * @property XsString fromName
 * @property XsString htmlContent
 * @property XsString plainTextContent
 * @property ApiCampaignReplyActions replyAction
 * @property XsString replyToAddress
 */
interface IApiTemplate extends IDataType
{
}
