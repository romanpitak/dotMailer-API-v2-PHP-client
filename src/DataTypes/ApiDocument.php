<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiDocument
 *
 * @property XsInt id
 * @property XsString name
 * @property XsString fileName
 * @property XsInt fileSize
 * @property XsDateTime dateCreated
 * @property XsDateTime dateModified
 */
final class ApiDocument extends JsonObject
{
    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'FileName' => 'XsString',
            'FileSize' => 'XsInt',
            'DateCreated' => 'XsDateTime',
            'DateModified' => 'XsDateTime'
        );
    }
}
