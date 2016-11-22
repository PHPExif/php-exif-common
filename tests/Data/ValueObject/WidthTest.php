<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Unit;
use PHPExif\Common\Data\ValueObject\Width;
use PHPExif\Common\Data\ValueObject\MeasuredObject;

/**
 * Class: WidthTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Width
 * @covers ::<!public>
 */
class WidthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testWidthIsInstanceOfMeasuredObject()
    {
        $width = new Width(1024, new Unit('px'));
        $this->assertInstanceOf(
            MeasuredObject::class,
            $width
        );
    }

    /**
     * @covers ::pixels
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testPixelsCreatesNewInstance()
    {
        $instance = Width::pixels(200);
        $this->assertInstanceOf(
            Width::class,
            $instance
        );
    }

    /**
     * @covers ::pixels
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testPixelsInstanceHasCorrectData()
    {
        $instance = Width::pixels(200);
        $this->assertEquals(
            200,
            $instance->getValue()
        );
        $this->assertInstanceOf(
            Unit::class,
            $instance->getUnit()
        );
        $this->assertEquals(
            'px',
            $instance->getUnit()
        );
    }

    /**
     * @covers ::fromWidth
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromWidthReturnsNewInstanceWithSameData()
    {
        $value = 2048;
        $unit = new Unit('px');
        $original = new Width($value, $unit);
        $copy = Width::fromWidth($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Width::class,
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
