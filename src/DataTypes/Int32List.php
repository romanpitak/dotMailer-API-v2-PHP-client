<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


class Int32List extends JsonArray
{

    protected function getDataClass()
    {
        return 'XsInt';
    }

}
