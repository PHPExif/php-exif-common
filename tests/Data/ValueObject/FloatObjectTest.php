<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\FloatObject;
use \InvalidArgumentException;

/**
 * Class: FloatObjectTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\FloatObject
 * @covers ::<!public>
 */
class FloatObjectTest extends \PHPUnit_Framework_TestCase
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
    public function testConstructionThrowsExceptionWhenNotFloatArgument($arg)
    {
        $this->expectException(InvalidArgumentException::class);
        $mock = m::mock(
            FloatObject::class
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
            ['foo'],
            [5],
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
    public function testConstructionShouldNotThrowExceptionForFloatArgument()
    {
        $mock = m::mock(
            FloatObject::class
        )->shouldDeferMissing();

        try {
            $mock->__construct(40.342456);
        } catch (\Exception $e) {
            $this->fail('Construction was not supposed to fail');
        }
    }

    /**
     * @covers ::getValue
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorRetrievesSetValue()
    {
        $mock = m::mock(
            FloatObject::class
        )->shouldDeferMissing();

        $mock->__construct(3.1415928);

        $this->assertEquals(
            3.1415928,
            $mock->getValue()
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
            FloatObject::class
        )->shouldDeferMissing();

        $mock->__construct(2.3334);
        $json = json_encode($mock);

        $this->assertEquals(
            json_encode(2.3334),
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
            FloatObject::class
        )->shouldDeferMissing();

        $mock->__construct(456.43);
        $this->assertEquals(
            '456.43',
            (string) $mock
        );
    }
}
