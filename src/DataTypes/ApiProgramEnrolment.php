<?php
/**
 *
 * @author Roman Piták <roman@pitak.net>
 * @author Alexander Turiak <alex@hexbrain.com>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiProgramEnrolment
 *
 * @property Guid ID
 * @property XsInt ProgramId
 * @property ApiProgramEnrolmentStatus Status
 * @property XsDateTime DateCreated
 * @property XsInt Contacts
 * @property XsInt AddressBooks
 */
final class ApiProgramEnrolment extends JsonObject
{
    protected function getProperties()
    {
        return array(
            'ID' => 'Guid',
            'ProgramId' => 'XsInt',
            'Status' => 'ApiProgramEnrolmentStatus',
            'DateCreated' => 'XsDateTime',
            'Contacts' => 'XsInt',
            'AddressBooks' => 'XsInt'
        );
    }

}
