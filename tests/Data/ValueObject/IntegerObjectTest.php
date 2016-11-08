<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\IntegerObject;
use \InvalidArgumentException;

/**
 * Class: IntegerObjectTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\IntegerObject
 * @covers ::<!public>
 */
class IntegerObjectTest extends \PHPUnit_Framework_TestCase
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
    public function testConstructionThrowsExceptionWhenNotIntegerArgument($arg)
    {
        $this->expectException(InvalidArgumentException::class);
        $mock = m::mock(
            IntegerObject::class
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
    public function testConstructionShouldNotThrowExceptionForIntegerArgument()
    {
        $mock = m::mock(
            IntegerObject::class
        )->shouldDeferMissing();

        try {
            $mock->__construct(200);
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
            IntegerObject::class
        )->shouldDeferMissing();

        $mock->__construct(400);

        $this->assertEquals(
            400,
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
            IntegerObject::class
        )->shouldDeferMissing();

        $mock->__construct(100);
        $json = json_encode($mock);

        $this->assertEquals(
            json_encode(100),
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
            IntegerObject::class
        )->shouldDeferMissing();

        $mock->__construct(800);
        $this->assertEquals(
            '800',
            (string) $mock
        );
    }
}
