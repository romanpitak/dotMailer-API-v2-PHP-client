<?php

namespace Dotmailer\Api\DataTypes;

final class ApiSurveyField extends JsonObject implements IApiTemplate
{
    protected function getProperties()
    {
        return [
            'Id' => 'XsInt',
            'Type' => 'XsString',
            'Text' => 'XsString',
            'IsRequired' => 'XsBoolean',
            'DefaultValue' => 'XsString',
            'Mode' => 'XsString',
            'Choices' => 'ApiSurveyFieldChoiceList',
            'SubFields' => 'ApiSurveyFieldList',
            'HasOtherOption' => 'XsBoolean',
            'OtherOptionChoiceId' => 'XsInt',
            'OtherOptionSubFieldId' => 'XsInt',
            'OtherOptionTextFieldId' => 'XsInt',
            'IsAssignedToContactDataField' => 'XsBoolean',
            'AssignedContactDataFieldName' => 'XsString',
            'AssignedContactDataExistsAction' => 'XsString'
        ];
    }
}

