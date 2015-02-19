<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiDocumentFolderList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiDocumentFolder';
    }

}
