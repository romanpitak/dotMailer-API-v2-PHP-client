<?php

namespace DotMailer\Api\DataTypes;


final class ApiSurveyResponseAnswerList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiSurveyResponseAnswer';
    }

}
