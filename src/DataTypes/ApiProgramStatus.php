<?php
/**
 *
 * @author Roman Piták <roman@pitak.net>
 * @author Alexander Turiak <alex@hexbrain.com>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiProgramStatus extends Enum
{

    const DRAFT       = 'Draft';
    const DEACTIVATED = 'Deactivated';
    const ACTIVE      = 'Active';
    const READONLY    = 'ReadOnly';
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
            self::DRAFT,
            self::DEACTIVATED,
            self::ACTIVE,
            self::READONLY,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
