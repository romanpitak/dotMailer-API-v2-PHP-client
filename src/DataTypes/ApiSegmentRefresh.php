<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiSegmentRefresh
 *
 * @property XsInt id
 * @property ApiSegmentRefreshStatuses status
 */
final class ApiSegmentRefresh extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Status' => 'ApiSegmentRefreshStatuses'
        );
    }

}
