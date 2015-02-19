<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiSplitTestMetrics extends Enum
{

    const OPENS = 'Opens';
    const CLICKS = 'Clicks';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::OPENS,
            self::CLICKS,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }


}
