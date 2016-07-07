<?php

namespace DotMailer\Api\DataTypes;


final class ApiSurveyFieldChoiceList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurveyFieldChoice';
    }

}
