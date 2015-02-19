<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class ApiDocumentFolder
 *
 * @property XsInt id
 * @property XsString name
 * @property ApiDocumentFolderList childFolders
 */
final class ApiDocumentFolder extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'ChildFolders' => 'ApiDocumentFolderList'
        );
    }

}
