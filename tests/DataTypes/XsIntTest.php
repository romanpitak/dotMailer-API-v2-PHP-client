<?php
/**
 * @package romanpitak/dotmailer-api-v2-client
 * @author Roman Piták <roman@pitak.net>
 * @copyright MIT
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class XsIntTest
 *
 * @covers \DotMailer\Api\DataTypes\XsInt
 */
class XsIntTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider      badDataProvider
     * @expectedException \DotMailer\Api\DataTypes\InvalidValueException
     * @param             $value
     */
    public function testCannotBeConstructedFrom($value)
    {
        new XsInt($value);
    }

    /**
     * @dataProvider      goodDataProvider
     * @param             mixed $value
     * @param             string $representation
     */
    public function testCanBeConstructedFrom($value, $representation)
    {
        $xsInt = new XsInt($value);
        $this->assertInstanceOf('\\DotMailer\\Api\\DataTypes\\XsInt', $xsInt);
        $this->assertEquals($representation, $xsInt->toJson());
        $this->assertEquals($representation, $xsInt->toArray());
        $this->assertEquals($representation, (string)$xsInt);
    }

    public function badDataProvider()
    {
        return array(
            'NullValue' => array(null),
            'NonIntegerValue' => array('not a number'),
            'FloatString' => array('1234.01'),
        );
    }

    public function goodDataProvider()
    {
        return array(
            'Zero Int' => array(0, '0'),
            'Int' => array(1234, '1234'),
            'IntString' => array('1234', '1234'),
            'Float' => array(1234.0, '1234'),
            'FloatString' => array('1234.0', '1234'),
        );
    }
}
