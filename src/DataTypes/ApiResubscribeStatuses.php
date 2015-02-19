<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiResubscribeStatuses extends Enum
{

    const CONTACT_ADDED = 'ContactAdded';
    const CONTACT_CHALLENGED = 'ContactChallenged';
    const CONTACT_CANNOT_BE_UNSUBSCRIBED = 'ContactCannotBeUnsuppressed';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::CONTACT_ADDED,
            self::CONTACT_CHALLENGED,
            self::CONTACT_CANNOT_BE_UNSUBSCRIBED,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }
}
