<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\Filename;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\Filename
 * @covers ::<!public>
 */
class FilenameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFilenameIsInstanceOfStringObject()
    {
        $filename = new Filename('Philip Roth');
        $this->assertInstanceOf(
            StringObject::class,
            $filename
        );
    }

    /**
     * @covers ::fromFilename
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFilenameReturnsNewInstanceWithSameData()
    {
        $original = new Filename('J. D. Salinger');
        $copy = Filename::fromFilename($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Filename::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
