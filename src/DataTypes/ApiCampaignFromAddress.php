<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiCampaignFromAddress
 *
 * @property XsInt id
 * @property XsString email
 *
 */
final class ApiCampaignFromAddress extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Email' => 'XsString'
        );
    }

}
