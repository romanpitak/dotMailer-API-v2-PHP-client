<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiContactResubscription
 *
 * @property ApiContact unsubscribedContact
 * @property XsString preferredLocale
 * @property XsString returnUrlToUseIfChallenged
 *
 */
final class ApiContactResubscription extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'UnsubscribedContact' => 'ApiContact',
            'PreferredLocale' => 'XsString',
            'ReturnUrlToUseIfChallenged' => 'XsString',
        );
    }

}
