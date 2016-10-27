<?php

namespace Tests\PHPExif\Common\Data;

use Mockery as m;
use PHPExif\Common\Data\Exif;
use PHPExif\Common\Data\Iptc;
use PHPExif\Common\Data\Metadata;

/**
 * Class: MetadataTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\Metadata
 * @covers ::<!public>
 */
class MetadataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getExif
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetExifReturnsCorrectData()
    {
        $exif = new Exif;
        $iptc = new Iptc;
        $metadata = new Metadata($exif, $iptc);

        $this->assertSame(
            $exif,
            $metadata->getExif()
        );
    }

    /**
     * @covers ::__construct
     * @covers ::getIptc
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetIptcReturnsCorrectData()
    {
        $exif = new Exif;
        $iptc = new Iptc;
        $metadata = new Metadata($exif, $iptc);

        $this->assertSame(
            $iptc,
            $metadata->getIptc()
        );
    }

    /**
     * @covers ::withExif
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithExifReturnsNewMetadataInstance()
    {
        $exif = new Exif;
        $exif2 = new Exif;
        $iptc = new Iptc;
        $metadata = new Metadata($exif, $iptc);
        $new = $metadata->withExif($exif2);

        $this->assertInstanceOf(
            Metadata::class,
            $new
        );

        $this->assertNotSame($metadata, $new);
        $this->assertSame(
            $exif2,
            $new->getExif()
        );
    }

    /**
     * @covers ::withIptc
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithIptcReturnsNewMetadataInstance()
    {
        $exif = new Exif;
        $iptc = new Iptc;
        $iptc2 = new Iptc;
        $metadata = new Metadata($exif, $iptc);
        $new = $metadata->withIptc($iptc2);

        $this->assertInstanceOf(
            Metadata::class,
            $new
        );

        $this->assertNotSame($metadata, $new);
        $this->assertSame(
            $iptc2,
            $new->getIptc()
        );
    }
}
