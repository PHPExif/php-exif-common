<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Dimensions;
use PHPExif\Common\Data\ValueObject\Height;
use PHPExif\Common\Data\ValueObject\Width;

/**
 * Class: DimensionsTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Dimensions
 * @covers ::<!public>
 */
class DimensionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionArguments()
    {
        $instance = new Dimensions(
            Width::pixels(800),
            Height::pixels(600)
        );
    }

    /**
     * @covers ::getWidth
     * @covers ::getHeight
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorsRetrieveCorrectData()
    {
        $width = Width::pixels(800);
        $height = Height::pixels(600);

        $dimensions = new Dimensions($width, $height);

        $this->assertSame(
            $width,
            $dimensions->getWidth()
        );
        $this->assertSame(
            $height,
            $dimensions->getHeight()
        );
    }

    /**
     * @covers ::fromDimensions
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromDimensionsReturnsNewInstanceWithSameData()
    {
        $width = Width::pixels(800);
        $height = Height::pixels(600);
        $original = new Dimensions($width, $height);

        $copy = Dimensions::fromDimensions($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Dimensions::class,
            $copy
        );

        $this->assertNotSame(
            $original->getWidth(),
            $copy->getWidth()
        );
        $this->assertEquals(
            $original->getWidth()->getValue(),
            $copy->getWidth()->getValue()
        );
        $this->assertNotSame(
            $original->getHeight(),
            $copy->getHeight()
        );
        $this->assertEquals(
            $original->getHeight()->getValue(),
            $copy->getHeight()->getValue()
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
    public function testJsonSerializableReturnsCorrectData()
    {
        $width = Width::pixels(800);
        $height = Height::pixels(600);
        $dimensions = new Dimensions($width, $height);
        $json = json_encode($dimensions);

        $this->assertEquals(
            json_encode(['width' => $width, 'height' => $height,]),
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
        $width = Width::pixels(800);
        $height = Height::pixels(600);
        $dimensions = new Dimensions($width, $height);
        $this->assertEquals(
            '800px x 600px',
            (string) $dimensions
        );
    }
}
