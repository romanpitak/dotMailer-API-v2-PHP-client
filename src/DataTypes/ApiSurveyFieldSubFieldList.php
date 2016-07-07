<?php

namespace DotMailer\Api\DataTypes;


final class ApiSurveyFieldSubFieldList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurveyFields';
    }

}
