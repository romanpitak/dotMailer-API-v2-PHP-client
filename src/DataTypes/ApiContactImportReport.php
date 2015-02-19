<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiContactImportReport
 *
 * @property XsInt NewContacts
 * @property XsInt UpdatedContacts
 * @property XsInt GloballySuppressed
 * @property XsInt InvalidEntries
 * @property XsInt DuplicateEmails
 * @property XsInt Blocked
 * @property XsInt Unsubscribed
 * @property XsInt HardBounced
 * @property XsInt SoftBounced
 * @property XsInt IspComplaints
 * @property XsInt MailBlocked
 * @property XsInt DomainSuppressed
 * @property XsInt PendingDoubleOptin
 * @property XsInt Failures
 */
final class ApiContactImportReport extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'NewContacts' => 'XsInt',
            'UpdatedContacts' => 'XsInt',
            'GloballySuppressed' => 'XsInt',
            'InvalidEntries' => 'XsInt',
            'DuplicateEmails' => 'XsInt',
            'Blocked' => 'XsInt',
            'Unsubscribed' => 'XsInt',
            'HardBounced' => 'XsInt',
            'SoftBounced' => 'XsInt',
            'IspComplaints' => 'XsInt',
            'MailBlocked' => 'XsInt',
            'DomainSuppressed' => 'XsInt',
            'PendingDoubleOptin' => 'XsInt',
            'Failures' => 'XsInt'
        );
    }

}
