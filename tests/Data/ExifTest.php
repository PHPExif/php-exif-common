<?php

namespace Tests\PHPExif\Common\Data;

use Mockery as m;
use PHPExif\Common\Data\Exif;
use PHPExif\Common\Data\ValueObject\Aperture;
use PHPExif\Common\Data\ValueObject\Author;
use PHPExif\Common\Data\ValueObject\Coordinates;
use PHPExif\Common\Data\ValueObject\DigitalDegrees;
use PHPExif\Common\Data\ValueObject\Dimensions;
use PHPExif\Common\Data\ValueObject\ExposureTime;
use PHPExif\Common\Data\ValueObject\Filename;
use PHPExif\Common\Data\ValueObject\Filesize;
use PHPExif\Common\Data\ValueObject\FocalLength;
use PHPExif\Common\Data\ValueObject\FocusDistance;
use PHPExif\Common\Data\ValueObject\Height;
use PHPExif\Common\Data\ValueObject\IsoSpeed;
use PHPExif\Common\Data\ValueObject\LineResolution;
use PHPExif\Common\Data\ValueObject\Make;
use PHPExif\Common\Data\ValueObject\MimeType;
use PHPExif\Common\Data\ValueObject\Model;
use PHPExif\Common\Data\ValueObject\Resolution;
use PHPExif\Common\Data\ValueObject\Software;
use PHPExif\Common\Data\ValueObject\Width;
use \DateTimeImmutable;

/**
 * Class: ExifTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\Exif
 * @covers ::<!public>
 */
class ExifTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::withAperture
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithApertureReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withAperture(new Aperture(5.6));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getAperture
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetApertureReturnsCorrectData()
    {
        $aperture = new Aperture(5.6);
        $old = new Exif();
        $new = $old->withAperture($aperture);

        $this->assertSame(
            $aperture,
            $new->getAperture()
        );
    }

    /**
     * @covers ::withMimeType
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithMimeTypeReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withMimeType(new MimeType('image/jpeg'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getMimeType
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetMimeTypeReturnsCorrectData()
    {
        $mimeType = new MimeType('image/jpeg');
        $old = new Exif();
        $new = $old->withMimeType($mimeType);

        $this->assertSame(
            $mimeType,
            $new->getMimeType()
        );
    }

    /**
     * @covers ::withFilename
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithFilenameReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withFilename(new Filename('IMG_01234.JPG'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getFilename
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetFilenameReturnsCorrectData()
    {
        $filename = new Filename('IMG_01234.JPG');
        $old = new Exif();
        $new = $old->withFilename($filename);

        $this->assertSame(
            $filename,
            $new->getFilename()
        );
    }

    /**
     * @covers ::withFilesize
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithFilesizeReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withFilesize(new Filesize(123456));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getFilesize
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetFilesizeReturnsCorrectData()
    {
        $filesize = new Filesize(123456);
        $old = new Exif();
        $new = $old->withFilesize($filesize);

        $this->assertSame(
            $filesize,
            $new->getFilesize()
        );
    }

    /**
     * @covers ::withMake
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithMakeReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withMake(new Make('Nikon'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getMake
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetMakeReturnsCorrectData()
    {
        $make = new Make('Nikon');
        $old = new Exif();
        $new = $old->withMake($make);

        $this->assertSame(
            $make,
            $new->getMake()
        );
    }

    /**
     * @covers ::withModel
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithModelReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withModel(new Model('Nikon D90'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getModel
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetModelReturnsCorrectData()
    {
        $model = new Model('Nikon D90');
        $old = new Exif();
        $new = $old->withModel($model);

        $this->assertSame(
            $model,
            $new->getModel()
        );
    }

    /**
     * @covers ::withSoftware
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithSoftwareReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withSoftware(new Software('Adobe Photoshop Lightroom'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getSoftware
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetSoftwareReturnsCorrectData()
    {
        $software = new Software('Adobe Photoshop Lightroom');
        $old = new Exif();
        $new = $old->withSoftware($software);

        $this->assertSame(
            $software,
            $new->getSoftware()
        );
    }

    /**
     * @covers ::withAuthor
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithAuthorReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withAuthor(new Author('Jack PhotoG'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getAuthor
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetAuthorReturnsCorrectData()
    {
        $author = new Author('Jack PhotoG');
        $old = new Exif();
        $new = $old->withAuthor($author);

        $this->assertSame(
            $author,
            $new->getAuthor()
        );
    }

    /**
     * @covers ::withDimensions
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithDimensionsReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withDimensions(
            new Dimensions(
                Width::pixels(1024),
                Height::pixels(1024)
            )
        );

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getDimensions
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetDimensionsReturnsCorrectData()
    {
        $dimensions = new Dimensions(
            Width::pixels(1024),
            Height::pixels(1024)
        );
        $old = new Exif();
        $new = $old->withDimensions($dimensions);

        $this->assertSame(
            $dimensions,
            $new->getDimensions()
        );
    }

    /**
     * @covers ::withFocalLength
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithFocalLengthReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withFocalLength(new FocalLength('350/10'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getFocalLength
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetFocalLengthReturnsCorrectData()
    {
        $focalLength = new FocalLength('350/10');
        $old = new Exif();
        $new = $old->withFocalLength($focalLength);

        $this->assertSame(
            $focalLength,
            $new->getFocalLength()
        );
    }

    /**
     * @covers ::withFocusDistance
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithFocusDistanceReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withFocusDistance(new FocusDistance('7.55m'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getFocusDistance
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetFocusDistanceReturnsCorrectData()
    {
        $focusDistance = new FocusDistance('2.49m');
        $old = new Exif();
        $new = $old->withFocusDistance($focusDistance);

        $this->assertSame(
            $focusDistance,
            $new->getFocusDistance()
        );
    }

    /**
     * @covers ::withExposureTime
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithExposureTimeReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withExposureTime(new ExposureTime('10/300'));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getExposureTime
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetExposureTimeReturnsCorrectData()
    {
        $exposureTime = new ExposureTime('1/60s');
        $old = new Exif();
        $new = $old->withExposureTime($exposureTime);

        $this->assertSame(
            $exposureTime,
            $new->getExposureTime()
        );
    }

    /**
     * @covers ::withIsoSpeed
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithIsoSpeedReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withIsoSpeed(new IsoSpeed(200));

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getIsoSpeed
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetIsoSpeedReturnsCorrectData()
    {
        $isoSpeed = new IsoSpeed(400);
        $old = new Exif();
        $new = $old->withIsoSpeed($isoSpeed);

        $this->assertSame(
            $isoSpeed,
            $new->getIsoSpeed()
        );
    }

    /**
     * @covers ::withCreationDate
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithCreationDateReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withCreationDate(
            new DateTimeImmutable('2016-11-17 20:00:00')
        );

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getCreationDate
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetCreationDateReturnsCorrectData()
    {
        $creationDate = new DateTimeImmutable('2016-11-17 20:00:00');
        $old = new Exif();
        $new = $old->withCreationDate($creationDate);

        $this->assertSame(
            $creationDate,
            $new->getCreationDate()
        );
    }

    /**
     * @covers ::withResolution
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithResolutionReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withResolution(
            new Resolution(
                LineResolution::dpi('300/1'),
                LineResolution::dpi('300/1')
            )
        );

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getResolution
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetResolutionReturnsCorrectData()
    {
        $resolution = new Resolution(
            LineResolution::dpi('300/1'),
            LineResolution::dpi('300/1')
        );
        $old = new Exif();
        $new = $old->withResolution($resolution);

        $this->assertSame(
            $resolution,
            $new->getResolution()
        );
    }

    /**
     * @covers ::withCoordinates
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithCoordinatesReturnsNewExifInstance()
    {
        $old = new Exif();
        $new = $old->withCoordinates(
            new Coordinates(
                new DigitalDegrees(40.741895),
                new DigitalDegrees(-73.989308)
            )
        );

        $this->assertInstanceOf(
            Exif::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getCoordinates
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetCoordinatesReturnsCorrectData()
    {
        $coordinates = new Coordinates(
            new DigitalDegrees(40.741895),
            new DigitalDegrees(-73.989308)
        );
        $old = new Exif();
        $new = $old->withCoordinates($coordinates);

        $this->assertSame(
            $coordinates,
            $new->getCoordinates()
        );
    }

    /**
     * @covers ::jsonSerialize
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testJsonSerializeReturnsArrayOfData()
    {
        $exif = new Exif();
        $data = $exif->jsonSerialize();

        $this->assertInternalType(
            'array',
            $data
        );
        $this->assertTrue(
            count($data) > 0
        );

        $this->assertEquals(
            json_encode($data),
            json_encode($exif)
        );
    }
}
