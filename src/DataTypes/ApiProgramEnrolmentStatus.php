<?php
/**
 *
 * @author Roman Piták <roman@pitak.net>
 * @author Alexander Turiak <alex@hexbrain.com>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiProgramEnrolmentStatus extends Enum
{

    const PROCESSING = 'Processing';
    const FINISHED   = 'Finished';
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
            self::PROCESSING,
            self::FINISHED,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
