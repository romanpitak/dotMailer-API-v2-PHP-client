<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiContactSuppression
 *
 * @property ApiContact suppressedContact
 * @property XsDateTime dateRemoved
 * @property ApiContactStatuses reason
 */
final class ApiContactSuppression extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'SuppressedContact' => 'ApiContact',
            'DateRemoved' => 'XsDateTime',
            'Reason' => 'ApiContactStatuses',
        );
    }

}
