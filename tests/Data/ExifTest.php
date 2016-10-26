<?php

namespace Tests\PHPExif\Common\Data;

use Mockery as m;
use PHPExif\Common\Data\Exif;
use PHPExif\Common\Data\ValueObject\Exif\Aperture;

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
}
