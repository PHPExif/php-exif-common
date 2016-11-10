<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\FocusDistance;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\FocusDistance
 * @covers ::<!public>
 */
class FocusDistanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFocusDistanceIsInstanceOfStringObject()
    {
        $focusDistance = new FocusDistance('7.98m');
        $this->assertInstanceOf(
            StringObject::class,
            $focusDistance
        );
    }

    /**
     * @covers ::fromFocusDistance
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFocusDistanceReturnsNewInstanceWithSameData()
    {
        $original = new FocusDistance('3.54m');
        $copy = FocusDistance::fromFocusDistance($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            FocusDistance::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
