<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactOptInTypes extends Enum
{

    const UNKNOWN = 'Unknown';
    const SINGLE = 'Single';
    const DOUBLE = 'Double';
    const VERIFIED_DOUBLE = 'VerifiedDouble';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::UNKNOWN,
            self::SINGLE,
            self::DOUBLE,
            self::VERIFIED_DOUBLE,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
