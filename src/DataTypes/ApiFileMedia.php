<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


/**
 * Class ApiFileMedia
 *
 * @property XsString fileName
 * @property XsBase64Binary data
 */
class ApiFileMedia extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'FileName' => 'XsString',
            'Data' => 'XsBase64Binary'
        );
    }

}
