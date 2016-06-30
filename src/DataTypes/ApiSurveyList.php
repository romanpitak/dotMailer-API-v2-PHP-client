<?php

namespace DotMailer\Api\DataTypes;

final class ApiSurveyList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurvey';
    }

}
