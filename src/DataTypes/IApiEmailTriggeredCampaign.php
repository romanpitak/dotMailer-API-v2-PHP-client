<?php
/**
 *
 *
 * @author Steven Jones <steven.jones@computerminds.co.uk>
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IApiEmailTriggeredCampaign
 *
 * @property StringList ToAddresses
 * @property StringList CCAddresses
 * @property StringList BCCAddresses
 * @property XsInt CampaignId
 * @property ApiPersonalizationValueList PersonalizationValues
 */
interface IApiEmailTriggeredCampaign extends IDataType
{
}
