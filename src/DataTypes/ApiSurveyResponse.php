<?php

namespace DotMailer\Api\DataTypes;

final class ApiSurveyResponse extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Email' => 'XsString',
            'Started' => 'XsBoolean',
            'DateStarted' => 'XsDateTime',
            'Complete' => 'XsBoolean',
            'DateCompleted' => 'XsDateTime',
            'GivenAnswers' => 'ApiSurveyResponseAnswerList',
        );
    }

}
