<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactSuppressionList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiContactSuppression';
    }

}
