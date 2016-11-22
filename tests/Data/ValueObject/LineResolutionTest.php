<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Unit;
use PHPExif\Common\Data\ValueObject\LineResolution;
use PHPExif\Common\Data\ValueObject\MeasuredObject;

/**
 * Class: LineResolutionTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\LineResolution
 * @covers ::<!public>
 */
class LineResolutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testLineResolutionIsInstanceOfMeasuredObject()
    {
        $lineResolution = new LineResolution('300/1', new Unit('dpi'));
        $this->assertInstanceOf(
            MeasuredObject::class,
            $lineResolution
        );
    }

    /**
     * @covers ::__construct
     * @dataProvider validLineResolutions
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testLineResolutionAcceptsCorrectFormats($arg)
    {
        try {
            $resolution = new LineResolution($arg, new Unit('dpi'));
        } catch (\Exception $e) {
            $this->fail('Construction should not fail...');
        }
    }

    /**
     * Provides a list of valid arguments
     *
     * @return array
     */
    public function validLineResolutions()
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
        new LineResolution($arg, new Unit('dpi'));
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
     * @dataProvider constructorRuntimeExceptionProvider
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionThrowsExceptionWhenNotCorrectFormat($arg)
    {
        $this->expectException(\RuntimeException::class);
        new LineResolution($arg, new Unit('dpi'));
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function constructorRuntimeExceptionProvider()
    {
        return [
            ['300'],
            ['300.1'],
            ['300dpi'],
        ];
    }

    /**
     * @covers ::dpi
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testDpiCreatesNewInstance()
    {
        $instance = LineResolution::dpi('300/1');
        $this->assertInstanceOf(
            LineResolution::class,
            $instance
        );
    }

    /**
     * @covers ::Dpi
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testPixelsInstanceHasCorrectData()
    {
        $instance = LineResolution::dpi('300/1');
        $this->assertEquals(
            300,
            $instance->getValue()
        );
        $this->assertInstanceOf(
            Unit::class,
            $instance->getUnit()
        );
        $this->assertEquals(
            'dpi',
            $instance->getUnit()
        );
    }

    /**
     * @covers ::fromLineResolution
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromLineResolutionReturnsNewInstanceWithSameData()
    {
        $value = '300/1';
        $unit = new Unit('dpi');
        $original = new LineResolution($value, $unit);
        $copy = LineResolution::fromLineResolution($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            LineResolution::class,
            $copy
        );

        $this->assertEquals(
            $original->getValue(),
            $copy->getValue()
        );

        $this->assertNotSame(
            $original->getUnit(),
            $copy->getUnit()
        );
        $this->assertEquals(
            (string) $original->getUnit(),
            (string) $copy->getUnit()
        );
    }
}
