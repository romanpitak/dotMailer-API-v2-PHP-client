<?php

namespace DotMailer\Api\DataTypes;


final class ApiSurveyResponseList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurveyResponse';
    }

}
