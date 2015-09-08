<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;



final class ApiProgramEnrolmentList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiProgramEnrolment';
    }

}
