<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\Width;
use PHPExif\Common\Data\ValueObject\IntegerObject;

/**
 * Class: WidthTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\Width
 * @covers ::<!public>
 */
class WidthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testWidthIsInstanceOfIntegerObject()
    {
        $width = new Width(1024);
        $this->assertInstanceOf(
            IntegerObject::class,
            $width
        );
    }

    /**
     * @covers ::fromWidth
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromWidthReturnsNewInstanceWithSameData()
    {
        $original = new Width(2048);
        $copy = Width::fromWidth($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Width::class,
            $copy
        );

        $this->assertEquals(
            $original->getValue(),
            $copy->getValue()
        );
    }
}
