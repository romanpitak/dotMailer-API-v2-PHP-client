<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiResubscribeResult
 *
 * @property ApiContact contact
 * @property ApiResubscribeStatuses status
 *
 */
final class ApiResubscribeResult extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Contact' => 'ApiContact',
            'Status' => 'ApiResubscribeStatuses'
        );
    }

}
