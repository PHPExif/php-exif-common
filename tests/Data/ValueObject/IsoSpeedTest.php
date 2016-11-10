<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\IsoSpeed;
use PHPExif\Common\Data\ValueObject\IntegerObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\IsoSpeed
 * @covers ::<!public>
 */
class IsoSpeedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testIsoSpeedIsInstanceOfIntegerObject()
    {
        $isoSpeed = new IsoSpeed(400);
        $this->assertInstanceOf(
            IntegerObject::class,
            $isoSpeed
        );
    }

    /**
     * @covers ::fromIsoSpeed
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromIsoSpeedReturnsNewInstanceWithSameData()
    {
        $original = new IsoSpeed(200);
        $copy = IsoSpeed::fromIsoSpeed($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            IsoSpeed::class,
            $copy
        );

        $this->assertEquals(
            $original->getValue(),
            $copy->getValue()
        );
    }
}
