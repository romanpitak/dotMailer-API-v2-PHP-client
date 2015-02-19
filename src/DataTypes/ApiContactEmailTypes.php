<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiContactEmailTypes extends Enum
{

    const PLAIN_TEXT = 'PlainText';
    const HTML = 'Html';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return "XsString";
    }

    protected function getPossibleValues()
    {
        return array(
            self::PLAIN_TEXT,
            self::HTML,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
