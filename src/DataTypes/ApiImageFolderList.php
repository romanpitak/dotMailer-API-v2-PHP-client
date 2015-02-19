<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiImageFolderList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiImageFolder';
    }

}
