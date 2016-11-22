<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\LineResolution;
use PHPExif\Common\Data\ValueObject\Resolution;

/**
 * Class: ResolutionTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Resolution
 * @covers ::<!public>
 */
class ResolutionTest extends \PHPUnit_Framework_TestCase
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
        $instance = new Resolution(
            LineResolution::dpi('300/1'),
            LineResolution::dpi('275/1')
        );
    }

    /**
     * @covers ::getHorizontalResolution
     * @covers ::getVerticalResolution
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorsRetrieveCorrectData()
    {
        $horizontal = LineResolution::dpi('300/1');
        $vertical = LineResolution::dpi('275/1');

        $resolution = new Resolution($horizontal, $vertical);

        $this->assertSame(
            $horizontal,
            $resolution->getHorizontalResolution()
        );
        $this->assertSame(
            $vertical,
            $resolution->getVerticalResolution()
        );
    }

    /**
     * @covers ::fromResolution
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromResolutionReturnsNewInstanceWithSameData()
    {
        $horizontal = LineResolution::dpi('300/1');
        $vertical = LineResolution::dpi('275/1');
        $original = new Resolution($horizontal, $vertical);

        $copy = Resolution::fromResolution($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Resolution::class,
            $copy
        );

        $this->assertNotSame(
            $original->getHorizontalResolution(),
            $copy->getHorizontalResolution()
        );
        $this->assertEquals(
            $original->getHorizontalResolution()->getValue(),
            $copy->getHorizontalResolution()->getValue()
        );
        $this->assertNotSame(
            $original->getVerticalResolution(),
            $copy->getVerticalResolution()
        );
        $this->assertEquals(
            $original->getVerticalResolution()->getValue(),
            $copy->getVerticalResolution()->getValue()
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
        $horizontal = LineResolution::dpi('300/1');
        $vertical = LineResolution::dpi('275/1');
        $resolution = new Resolution($horizontal, $vertical);
        $json = json_encode($resolution);

        $this->assertEquals(
            json_encode(['horizontal' => $horizontal, 'vertical' => $vertical,]),
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
        $horizontal = LineResolution::dpi('300/1');
        $vertical = LineResolution::dpi('275/1');
        $resolution = new Resolution($horizontal, $vertical);
        $this->assertEquals(
            '300dpi x 275dpi',
            (string) $resolution
        );
    }
}
