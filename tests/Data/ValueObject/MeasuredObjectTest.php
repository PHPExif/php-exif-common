<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\MeasuredObject;
use PHPExif\Common\Data\ValueObject\Unit;

/**
 * Class: MeasuredObjectTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\MeasuredObject
 * @covers ::<!public>
 */
class MeasuredObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionArguments()
    {
        $value = 400;
        $unit = new Unit('px');

        $mock = m::mock(
            MeasuredObject::class
        )->shouldDeferMissing();

        $mock->__construct($value, $unit);
    }

    /**
     * @covers ::getValue
     * @covers ::getUnit
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorsRetrieveCorrectData()
    {
        $value = 400;
        $unit = new Unit('px');

        $mock = m::mock(
            MeasuredObject::class
        )->shouldDeferMissing();

        $mock->__construct($value, $unit);

        $this->assertEquals(
            $value,
            $mock->getValue()
        );
        $this->assertSame(
            $unit,
            $mock->getUnit()
        );
    }

    /**
     * @covers ::jsonSerialize
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testJsonSerializableReturnsCorrectString()
    {
        $value = 400;
        $unit = new Unit('px');
        $mock = m::mock(
            MeasuredObject::class
        )->shouldDeferMissing();

        $mock->__construct($value, $unit);
        $json = json_encode($mock);

        $this->assertEquals(
            json_encode(['value' => $value, 'unit' => (string) $unit]),
            $json
        );
    }

    /**
     * @covers ::__toString
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testToStringReturnsCorrectStringVersion()
    {
        $value = 400;
        $unit = new Unit('px');
        $mock = m::mock(
            MeasuredObject::class
        )->shouldDeferMissing();

        $mock->__construct($value, $unit);
        $this->assertEquals(
            '400' . (string) $unit,
            (string) $mock
        );
    }
}
