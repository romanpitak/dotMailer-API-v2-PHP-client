<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiSms
 *
 * @property XsString message
 */
final class ApiSms extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Message' => 'XsString'
        );
    }

}
