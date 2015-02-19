<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiImageFolder\
 *
 * @property XsInt id
 * @property XsString name
 * @property ApiImageFolderList childFolders
 */
final class ApiImageFolder extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'ChildFolders' => 'ApiImageFolderList'
        );
    }
}
