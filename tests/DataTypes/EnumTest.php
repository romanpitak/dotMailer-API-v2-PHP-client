<?php
/**
 * @package romanpitak/dotmailer-api-v2-client
 * @author Roman Piták <roman@pitak.net>
 * @copyright MIT
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class EnumTest
 */
abstract class EnumTest extends Grammar
{

    /**
     * @return \SimpleXMLElement
     */
    public function testNotDeprecated()
    {
        $simpleTypeName = lcfirst(array_pop(explode('\\', $this->dataClassName)));
        $this->xpath[] = 'xs:simpleType[@name="' . $simpleTypeName . '"]';
        $this->xpath = '/' . implode('/', $this->xpath);

        $elements = $this->xml->xpath($this->xpath);
        $this->assertEquals(1, count($elements));
        return $elements[0];
    }

    /**
     * @return \ReflectionClass
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists($this->dataClassName));
        return new \ReflectionClass($this->dataClassName);
    }

    /**
     * @depends testClassExists
     *
     * @expectedException \DotMailer\Api\DataTypes\InvalidValueException
     */
    public function testCannotBeConstructed()
    {
        new $this->dataClassName('romanpitak');
    }

    /**
     * @depends testNotDeprecated
     * @depends testClassExists
     *
     * @param \SimpleXMLElement $element
     * @param \ReflectionClass $oClass
     */
    public function testConstants(\SimpleXMLElement $element, \ReflectionClass $oClass)
    {
        $constants = $oClass->getConstants();
        foreach ($element->xpath('xs:restriction/xs:enumeration') as $restriction) {
            $const = (string)$restriction['value'];
            $this->assertTrue(in_array($const, $constants));
            $constants = array_diff($constants, array($const));
        }
        $this->assertEmpty($constants);
    }

    /**
     * Test that restrictions from the WADL specification match the allowed values and the constants of the Enum class
     *
     * @depends testNotDeprecated
     * @depends testClassExists
     *
     * @param \SimpleXMLElement $element
     * @param \ReflectionClass $oClass
     * @return array $restrictions
     */
    public function testGetPossibleValues(\SimpleXMLElement $element, \ReflectionClass $oClass)
    {
        // get restrictions
        $restrictions = array();
        foreach ($element->xpath('xs:restriction/xs:enumeration') as $restriction) {
            $restrictions[] = (string)$restriction['value'];
        }

        // get allowed values
        $getPossibleValues = $oClass->getMethod('getPossibleValues');
        $getPossibleValues->setAccessible(true);
        $allowedValues = $getPossibleValues->invoke(new $this->dataClassName($restrictions[0]));

        // get constants
        $constants = $oClass->getConstants();

        // test implemented
        foreach ($restrictions as $restriction) {
            $constantName = self::constantName($restriction);
            $this->assertTrue(in_array($restriction, $allowedValues));
            $this->assertArrayHasKey($constantName, $constants);
            $this->assertEquals($restriction, $constants[$constantName]);
        }

        // test not deprecated
        foreach ($allowedValues as $allowedValue) {
            $this->assertTrue(in_array($allowedValue, $restrictions));
        }

        return $restrictions;
    }

    /**
     * @depends testGetPossibleValues
     *
     * @param array $restrictions
     */
    public function testToString($restrictions)
    {
        foreach ($restrictions as $restriction) {
            $dataClass = new $this->dataClassName($restriction);
            $this->assertEquals($restriction, (string)$dataClass);
        }
    }

    /**
     * @depends testGetPossibleValues
     *
     * @param array $restrictions
     */
    public function testToArray($restrictions)
    {
        foreach ($restrictions as $restriction) {
            /** @var $dataClass IDataType */
            $dataClass = new $this->dataClassName($restriction);
            $this->assertEquals($restriction, $dataClass->toArray());
        }
    }

    /**
     * @depends testGetPossibleValues
     *
     * @param array $restrictions
     */
    public function testToJson($restrictions)
    {
        foreach ($restrictions as $restriction) {
            /** @var $dataClass IDataType */
            $dataClass = new $this->dataClassName($restriction);
            $this->assertEquals(json_encode($restriction), $dataClass->toJson());
        }
    }

    /*
     * ========== helpers ==========
     */

    /**
     * Convert restriction name to constant name.
     *
     * Convert camelCase to CAMEL_CASE and apply exceptions (mostly php keywords).
     *
     * @param string $restrictionName
     * @return string $constantName
     */
    private static function constantName($restrictionName)
    {
        $constantName = strtoupper(preg_replace('/([a-z])([A-Z])/', '$1_$2', $restrictionName));

        $specialCases = array(
            'PRIVATE' => 'HIDDEN',
            'PUBLIC' => 'VISIBLE'
        );
        if (array_key_exists($constantName, $specialCases)) {
            $constantName = $specialCases[$constantName];
        }

        return $constantName;
    }
}
