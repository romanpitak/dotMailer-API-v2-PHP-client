<?php
/**
 *
 * @author Roman Piták <roman@pitak.net>
 * @author Alexander Turiak <alex@hexbrain.com>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiProgram
 *
 * @property XsInt ID
 * @property XsString Name
 * @property ApiProgramStatus Status
 * @property XsDateTime DateCreated
 */
final class ApiProgram extends JsonObject
{
    protected function getProperties()
    {
        return array(
            'ID' => 'XsInt',
            'Name' => 'XsString',
            'Status' => 'ApiProgramStatus',
            'DateCreated' => 'XsDateTime',
        );
    }

}
