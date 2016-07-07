<?php

namespace Dotmailer\Api\DataTypes;

final class ApiSurveyFieldChoice extends JsonObject implements IApiTemplate
{
    protected function getProperties()
    {
        return [
            'Id' => 'XsInt',
            'Text' => 'XsString',
        ];
    }
}

