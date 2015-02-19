<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiAddressBookVisibility extends Enum
{

    const VISIBLE = 'Public';
    const HIDDEN = 'Private';
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
            self::VISIBLE,
            self::HIDDEN,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
