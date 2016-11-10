<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\HorizontalResolution;
use PHPExif\Common\Data\ValueObject\IntegerObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\HorizontalResolution
 * @covers ::<!public>
 */
class HorizontalResolutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testHorizontalResolutionIsInstanceOfStringObject()
    {
        $horizontalResolution = new HorizontalResolution('300/1');
        $this->assertInstanceOf(
            IntegerObject::class,
            $horizontalResolution
        );
    }

    /**
     * @covers ::__construct
     * @dataProvider validHorizontalResolutions
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testHorizontalResolutionAcceptsCorrectFormats($arg)
    {
        try {
            $horizontalResolution = new HorizontalResolution($arg);
        } catch (\Exception $e) {
            $this->fail('Construction should not fail...');
        }
    }

    /**
     * Provides a list of valid arguments
     *
     * @return array
     */
    public function validHorizontalResolutions()
    {
        return [
            ['300/1'],
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
        new HorizontalResolution($arg);
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
    public function testHorizontalResolutionConstructionThrowsExceptionForInvalidFormat()
    {
        $this->setExpectedException(\RuntimeException::class);

        new HorizontalResolution('foo');
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testHorizontalResolutionConstructionNormalizesArgument()
    {
        $horizontalResolution = new HorizontalResolution('300/1');

        $this->assertEquals(
            300,
            $horizontalResolution->getValue()
        );
    }

    /**
     * @covers ::fromHorizontalResolution
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromHorizontalResolutionReturnsNewInstanceWithSameData()
    {
        $original = new HorizontalResolution('300/1');
        $copy = HorizontalResolution::fromHorizontalResolution($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            HorizontalResolution::class,
            $copy
        );

        $this->assertEquals(
            $original->getValue(),
            $copy->getValue()
        );
    }
}
