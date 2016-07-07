<?php

namespace DotMailer\Api\DataTypes;


final class ApiSurveyFieldList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurveyField';
    }

}
