<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiImage
 *
 * @property XsInt id
 * @property XsString name
 * @property XsString path
 */
final class ApiImage extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Path' => 'XsString'
        );
    }

}
