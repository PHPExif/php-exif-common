<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Make;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Make
 * @covers ::<!public>
 */
class MakeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testMakeIsInstanceOfStringObject()
    {
        $make = new Make('NIKON CORPORATION');
        $this->assertInstanceOf(
            StringObject::class,
            $make
        );
    }

    /**
     * @covers ::fromMake
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMakeReturnsNewInstanceWithSameData()
    {
        $original = new Make('NIKON CORPORATION');
        $copy = Make::fromMake($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Make::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
