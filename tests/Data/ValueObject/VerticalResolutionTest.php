<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\VerticalResolution;
use PHPExif\Common\Data\ValueObject\IntegerObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\VerticalResolution
 * @covers ::<!public>
 */
class VerticalResolutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testVerticalResolutionIsInstanceOfStringObject()
    {
        $verticalResolution = new VerticalResolution('300/1');
        $this->assertInstanceOf(
            IntegerObject::class,
            $verticalResolution
        );
    }

    /**
     * @covers ::__construct
     * @dataProvider validVerticalResolutions
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testVerticalResolutionAcceptsCorrectFormats($arg)
    {
        try {
            $verticalResolution = new VerticalResolution($arg);
        } catch (\Exception $e) {
            $this->fail('Construction should not fail...');
        }
    }

    /**
     * Provides a list of valid arguments
     *
     * @return array
     */
    public function validVerticalResolutions()
    {
        return [
            ['300/1'],
        ];
    }

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
        $this->expectException(\InvalidArgumentException::class);
        new VerticalResolution($arg);
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
    public function testVerticalResolutionConstructionThrowsExceptionForInvalidFormat()
    {
        $this->setExpectedException(\RuntimeException::class);

        new VerticalResolution('foo');
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testVerticalResolutionConstructionNormalizesArgument()
    {
        $verticalResolution = new VerticalResolution('300/1');

        $this->assertEquals(
            300,
            $verticalResolution->getValue()
        );
    }

    /**
     * @covers ::fromVerticalResolution
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromVerticalResolutionReturnsNewInstanceWithSameData()
    {
        $original = new VerticalResolution('300/1');
        $copy = VerticalResolution::fromVerticalResolution($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            VerticalResolution::class,
            $copy
        );

        $this->assertEquals(
            $original->getValue(),
            $copy->getValue()
        );
    }
}
