<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Unit;
use PHPExif\Common\Data\ValueObject\Height;
use PHPExif\Common\Data\ValueObject\MeasuredObject;

/**
 * Class: HeightTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Height
 * @covers ::<!public>
 */
class HeightTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testHeightIsInstanceOfMeasuredObject()
    {
        $height = new Height(1024, new Unit('px'));
        $this->assertInstanceOf(
            MeasuredObject::class,
            $height
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
        $instance = Height::pixels(200);
        $this->assertInstanceOf(
            Height::class,
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
        $instance = Height::pixels(200);
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
     * @covers ::fromHeight
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromHeightReturnsNewInstanceWithSameData()
    {
        $value = 2048;
        $unit = new Unit('px');
        $original = new Height($value, $unit);
        $copy = Height::fromHeight($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Height::class,
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
