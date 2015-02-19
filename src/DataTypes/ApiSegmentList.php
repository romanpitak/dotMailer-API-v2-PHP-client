<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiSegmentList extends JsonArray
{

    public function getDataClass()
    {
        return 'ApiSegment';
    }

}
