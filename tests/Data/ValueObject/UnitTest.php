<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Unit;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Unit
 * @covers ::<!public>
 */
class UnitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testUnitIsInstanceOfStringObject()
    {
        $unit = new Unit('px');
        $this->assertInstanceOf(
            StringObject::class,
            $unit
        );
    }

    /**
     * @covers ::fromUnit
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromUnitReturnsNewInstanceWithSameData()
    {
        $original = new Unit('bit');
        $copy = Unit::fromUnit($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Unit::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
