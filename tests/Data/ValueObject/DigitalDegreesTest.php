<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\DigitalDegrees;
use PHPExif\Common\Data\ValueObject\FloatObject;

/**
 * Class: DigitalDegreesTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\DigitalDegrees
 * @covers ::<!public>
 */
class DigitalDegreesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testDigitalDegreesIsInstanceOfFloatObject()
    {
        $digitalDegrees = new DigitalDegrees(40.741895);
        $this->assertInstanceOf(
            FloatObject::class,
            $digitalDegrees
        );
    }

    /**
     * @covers ::fromDigitalDegrees
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromDigitalDegreesReturnsNewInstanceWithSameData()
    {
        $original = new DigitalDegrees(40.741895);
        $copy = DigitalDegrees::fromDigitalDegrees($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            DigitalDegrees::class,
            $copy
        );

        $this->assertEquals(
            $original->getValue(),
            $copy->getValue()
        );
    }
}
