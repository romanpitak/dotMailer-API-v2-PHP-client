<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignContactRoiDetail
 *
 * @property XsInt contactId
 * @property XsString email
 * @property XsString markerName
 * @property ApiRoiDetailDataTypes dataType
 * @property Mixed value
 * @property XsDateTime dateEntered
 *
 */
final class ApiCampaignContactRoiDetail extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'ContactId' => 'XsInt',
            'Email' => 'XsString',
            'MarkerName' => 'XsString',
            'DataType' => 'ApiRoiDetailDataTypes',
            'Value' => 'Mixed',
            'DateEntered' => 'XsDateTime'
        );
    }

}
