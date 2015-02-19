<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiJsonData
 *
 * @property XsString json
 */
final class ApiJsonData extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Json' => 'XsString'
        );
    }

}
