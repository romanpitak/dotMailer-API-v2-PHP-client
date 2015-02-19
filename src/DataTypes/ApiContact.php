<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiContact
 *
 * @property XsInt id
 * @property XsString email
 * @property ApiContactOptInTypes optInType
 * @property ApiContactEmailTypes emailType
 * @property ApiContactDataList dataFields
 * @property ApiContactStatuses status
 *
 *
 */
final class ApiContact extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Email' => 'XsString',
            'OptInType' => 'ApiContactOptInTypes',
            'EmailType' => 'ApiContactEmailTypes',
            'DataFields' => 'ApiContactDataList',
            'Status' => 'ApiContactStatuses'
        );
    }

}
