<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

final class ApiDataTypes extends Enum
{

    const STRING = 'String';
    const NUMERIC = 'Numeric';
    const DATE = 'Date';
    const BOOLEAN = 'Boolean';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';


    /*
     * ========== Enum ==========
     */

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::STRING,
            self::NUMERIC,
            self::DATE,
            self::BOOLEAN,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
