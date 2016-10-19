<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\StringObject;
use \InvalidArgumentException;

/**
 * Class: StringObjectTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\StringObject
 * @covers ::<!public>
 */
class StringObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @dataProvider constructorExceptionProvider
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionThrowsExceptionWhenNotStringArgument($arg)
    {
        $this->expectException(InvalidArgumentException::class);
        $mock = m::mock(
            StringObject::class
        )->shouldDeferMissing();

        $mock->__construct($arg);
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function constructorExceptionProvider()
    {
        return [
            [1],
            [5.6],
            [false],
            [true],
            [null],
            [[]],
            [(new \stdClass)],
            [function () {}],
        ];
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionShouldNotThrowExceptionForStringArgument()
    {
        $mock = m::mock(
            StringObject::class
        )->shouldDeferMissing();

        try {
            $mock->__construct('foo');
        } catch (\Exception $e) {
            $this->fail('Construction was not supposed to fail');
        }
    }

    /**
     * @covers ::getStringData
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorRetrievesSetStringData()
    {
        $mock = m::mock(
            StringObject::class
        )->shouldDeferMissing();

        $mock->__construct('foo');

        $this->assertEquals(
            'foo',
            $mock->getStringData()
        );
    }

    /**
     * @covers ::jsonSerialize
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testJsonSerializableReturnsCorrectString()
    {
        $mock = m::mock(
            StringObject::class
        )->shouldDeferMissing();

        $mock->__construct('foo');
        $json = json_encode($mock);

        $this->assertEquals(
            json_encode('foo'),
            $json
        );
    }

    /**
     * @covers ::__toString
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testToStringReturnsCorrectStringVersion()
    {
        $mock = m::mock(
            StringObject::class
        )->shouldDeferMissing();

        $mock->__construct('foo');
        $this->assertEquals(
            'foo',
            (string) $mock
        );
    }
}
