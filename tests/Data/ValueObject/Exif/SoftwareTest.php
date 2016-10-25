<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\Software;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\Software
 * @covers ::<!public>
 */
class SoftwareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testSoftwareIsInstanceOfStringObject()
    {
        $software = new Software('Adobe Photoshop Lightroom 6.0 (Macintosh)');
        $this->assertInstanceOf(
            StringObject::class,
            $software
        );
    }

    /**
     * @covers ::fromSoftware
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromSoftwareReturnsNewInstanceWithSameData()
    {
        $original = new Software('Adobe Photoshop Lightroom 6.0 (Macintosh)');
        $copy = Software::fromSoftware($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Software::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
