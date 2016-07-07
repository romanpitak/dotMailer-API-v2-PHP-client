<?php

namespace DotMailer\Api\DataTypes;

final class ApiSurveyFields extends JsonObject
{

    protected function getProperties()
    {
        return [
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Fields' => 'ApiSurveyFieldList'
        ];
    }
}

