<?php
/**
 * @package romanpitak/dotmailer-api-v2-client
 * @author Roman Piták <roman@pitak.net>
 * @copyright MIT
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class Grammar
 */
abstract class Grammar extends \PHPUnit_Framework_TestCase
{

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        global $wadlData;
        $this->xml = simplexml_load_string($wadlData);

        $this->xpath = array(
            'wadl:application',
            'wadl:grammars',
            'xs:schema'
        );

        $this->dataClassName = substr(get_class($this), 0, -4); // Remove "Test" from name

    }

}

