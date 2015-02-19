<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignSend
 *
 * @property Guid id
 * @property XsInt CampaignId
 * @property Int32List AddressBookIds
 * @property Int32List ContactIds
 * @property XsDateTime SendDate
 * @property ApiSplitTestSendOptions SplitTestOptions
 * @property ApiCampaignSendStatuses Status
 */
final class ApiCampaignSend extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'Guid',
            'CampaignId' => 'XsInt',
            'AddressBookIds' => 'Int32List',
            'ContactIds' => 'Int32List',
            'SendDate' => 'XsDateTime',
            'SplitTestOptions' => 'ApiSplitTestSendOptions',
            'Status' => 'ApiCampaignSendStatuses'
        );
    }

}
