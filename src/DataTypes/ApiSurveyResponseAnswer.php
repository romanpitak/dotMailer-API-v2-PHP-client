<?php

namespace DotMailer\Api\DataTypes;

final class ApiSurveyResponseAnswer extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'FieldId' => 'XsInt',
            'SubFieldId' => 'XsInt',
            'Value' => 'XsString',
        );
    }
}
