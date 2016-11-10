<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Height;
use PHPExif\Common\Data\ValueObject\IntegerObject;

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
    public function testHeightIsInstanceOfIntegerObject()
    {
        $height = new Height(1024);
        $this->assertInstanceOf(
            IntegerObject::class,
            $height
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
        $original = new Height(2048);
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
    }
}
