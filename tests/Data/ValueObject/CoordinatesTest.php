<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\DigitalDegrees;
use PHPExif\Common\Data\ValueObject\Coordinates;

/**
 * Class: CoordinatesTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Coordinates
 * @covers ::<!public>
 */
class CoordinatesTest extends \PHPUnit_Framework_TestCase
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
        $instance = new Coordinates(
            new DigitalDegrees(40.741895),
            new DigitalDegrees(-73.989308)
        );
    }

    /**
     * @covers ::getLatitude
     * @covers ::getLongitude
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorsRetrieveCorrectData()
    {
        $latitude = new DigitalDegrees(40.741895);
        $longitude = new DigitalDegrees(-73.989308);

        $coordinates = new Coordinates($latitude, $longitude);

        $this->assertSame(
            $latitude,
            $coordinates->getLatitude()
        );
        $this->assertSame(
            $longitude,
            $coordinates->getLongitude()
        );
    }

    /**
     * @covers ::fromCoordinates
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromCoordinatesReturnsNewInstanceWithSameData()
    {
        $latitude = new DigitalDegrees(40.741895);
        $longitude = new DigitalDegrees(-73.989308);
        $original = new Coordinates($latitude, $longitude);

        $copy = Coordinates::fromCoordinates($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Coordinates::class,
            $copy
        );

        $this->assertNotSame(
            $original->getLatitude(),
            $copy->getLatitude()
        );
        $this->assertEquals(
            $original->getLatitude()->getValue(),
            $copy->getLatitude()->getValue()
        );
        $this->assertNotSame(
            $original->getLongitude(),
            $copy->getLongitude()
        );
        $this->assertEquals(
            $original->getLongitude()->getValue(),
            $copy->getLongitude()->getValue()
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
        $latitude = new DigitalDegrees(40.741895);
        $longitude = new DigitalDegrees(-73.989308);
        $coordinates = new Coordinates($latitude, $longitude);
        $json = json_encode($coordinates);

        $this->assertEquals(
            json_encode(['latitude' => $latitude, 'longitude' => $longitude,]),
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
        $latitude = new DigitalDegrees(40.741895);
        $longitude = new DigitalDegrees(-73.989308);
        $coordinates = new Coordinates($latitude, $longitude);
        $this->assertEquals(
            '40.741895,-73.989308',
            (string) $coordinates
        );
    }
}
