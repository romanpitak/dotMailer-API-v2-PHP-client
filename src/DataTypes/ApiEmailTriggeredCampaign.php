<?php
/**
 *
 *
 * @author Steven Jones <steven.jones@computerminds.co.uk>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiEmailTriggeredCampaign
 *
 * @property StringList ToAddresses
 * @property StringList CCAddresses
 * @property StringList BCCAddresses
 * @property XsInt CampaignId
 * @property ApiPersonalizationValueList PersonalizationValues
 */
final class ApiEmailTriggeredCampaign extends JsonObject implements IApiEmailTriggeredCampaign
{

    protected function getProperties()
    {
        return array(
            'ToAddresses' => 'StringList',
            'CCAddresses' => 'StringList',
            'BCCAddresses' => 'StringList',
            'CampaignId' => 'XsInt',
            'PersonalizationValues' => 'ApiPersonalizationValueList',
        );
    }

}
