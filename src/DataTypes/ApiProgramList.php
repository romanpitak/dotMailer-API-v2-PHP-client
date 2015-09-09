<?php
/**
 *
 * @author Roman Piták <roman@pitak.net>
 * @author Alexander Turiak <alex@hexbrain.com>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiProgramList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiProgram';
    }

}
