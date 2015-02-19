<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiDocumentList extends JsonArray
{

    protected function getDataClass()
    {
        return 'ApiDocument';
    }

}
