<?php

namespace DotMailer\Api\DataTypes;


final class ApiSurveyFieldsList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurveyFields';
    }

}
