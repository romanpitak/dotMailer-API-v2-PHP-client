<?php
/**
 *
 * @author Roman Piták <roman@pitak.net>
 * @author Alexander Turiak <alex@hexbrain.com>
 *
 */


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
