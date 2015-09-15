<?php
/*
 * This file is part of the romanpitak/dotmailer-api-v2-client package.
 *
 * (c) Roman Piták <roman@pitak.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class WadlCoverageTest extends \PHPUnit_Framework_TestCase
{

    private $xml = null;

    /*
     * ========== tests ==========
     */

    /**
     * @param $name
     * @dataProvider grammarsProvider
     */
    public function testGrammarImplemented($name)
    {
        $this->assertTrue(class_exists('\\DotMailer\\Api\\DataTypes\\' . $name));
    }

    /**
     * @param $name
     * @dataProvider resourcesProvider
     */
    public function testResourceImplemented($name)
    {
        $this->assertTrue(method_exists('\\DotMailer\\Api\\Resources\\Resources', $name));
    }

    /*
     * ========== data providers ==========
     */

    public function grammarsProvider()
    {
        $dataTypes = $this->getXml()->xpath('/wadl:application/wadl:grammars/xs:schema/xs:element');
        $result = array();
        foreach ($dataTypes as $dataType) {
            $name = (string)$dataType['name'];
            $result[$name] = array($name);
        }
        return $result;
    }

    public function resourcesProvider()
    {
        $resources = $this->getXml()->xpath('/wadl:application/wadl:resources/wadl:resource/wadl:method');
        $result = array();
        foreach ($resources as $resource) {
            $name = (string)$resource['id'];
            $result[$name] = array($name);
        }
        return $result;
    }

    /**
     * @return \SimpleXMLElement
     */
    private function getXml()
    {
        if (is_null($this->xml)) {
            $this->xml = simplexml_load_string(file_get_contents('./api_wadl.xml'));
        }
        return $this->xml;
    }

}
