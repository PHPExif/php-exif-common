<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\ExposureTime;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\ExposureTime
 * @covers ::<!public>
 */
class ExposureTimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testExposureTimeIsInstanceOfStringObject()
    {
        $exposureTime = new ExposureTime('1/320');
        $this->assertInstanceOf(
            StringObject::class,
            $exposureTime
        );
    }

    /**
     * @covers ::__construct
     * @dataProvider validExposureTimes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testExposureTimeAcceptsCorrectFormats($arg)
    {
        try {
            $exposureTime = new ExposureTime($arg);
        } catch (\Exception $e) {
            $this->fail('Construction should not fail...');
        }
    }

    /**
     * Provides a list of valid exposure times
     *
     * @return array
     */
    public function validExposureTimes()
    {
        return [
            ['1/320'],
            ['1/320s'],
            ['10/300s'],
            ['10/300s'],
        ];
    }

    /**
     * @covers ::__construct
     * @dataProvider constructorExceptionProvider
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionThrowsExceptionWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        new ExposureTime($arg);
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function constructorExceptionProvider()
    {
        return [
            [1],
            [5.6],
            [false],
            [true],
            [null],
            [[]],
            [(new \stdClass)],
            [function () {}],
        ];
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testExposureTimeConstructionThrowsExceptionForInvalidFormat()
    {
        $this->setExpectedException(\RuntimeException::class);

        new ExposureTime('foo');
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testExposureTimeConstructionNormalizesArgument()
    {
        $exposureTime = new ExposureTime('1/320s');

        $this->assertEquals(
            '1/320',
            $exposureTime->getStringData()
        );
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testExposureTimeConstructionNormalizesArgument2()
    {
        $exposureTime = new ExposureTime('10/300s');

        $this->assertEquals(
            '1/30',
            $exposureTime->getStringData()
        );
    }

    /**
     * @covers ::fromExposureTime
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromExposureTimeReturnsNewInstanceWithSameData()
    {
        $original = new ExposureTime('1/60');
        $copy = ExposureTime::fromExposureTime($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            ExposureTime::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
