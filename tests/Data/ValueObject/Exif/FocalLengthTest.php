<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\FocalLength;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\FocalLength
 * @covers ::<!public>
 */
class FocalLengthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFocalLengthIsInstanceOfStringObject()
    {
        $focalLength = new FocalLength('350/10');
        $this->assertInstanceOf(
            StringObject::class,
            $focalLength
        );
    }

    /**
     * @covers ::__construct
     * @dataProvider validFocalLengths
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFocalLengthAcceptsCorrectFormats($arg)
    {
        try {
            $focalLength = new FocalLength($arg);
        } catch (\Exception $e) {
            $this->fail('Construction should not fail...');
        }
    }

    /**
     * Provides a list of valid exposure times
     *
     * @return array
     */
    public function validFocalLengths()
    {
        return [
            ['35/1'],
            ['500/10'],
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
        new FocalLength($arg);
    }

    /**
     * @covers ::fromMM
     * @dataProvider constructorExceptionProvider
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMMThrowsExceptionWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        FocalLength::fromMM($arg);
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
    public function testFocalLengthConstructionThrowsExceptionForInvalidFormat()
    {
        $this->setExpectedException(\RuntimeException::class);

        new FocalLength('foo');
    }

    /**
     * @covers ::fromMM
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMMThrowsExceptionForInvalidFormat()
    {
        $this->setExpectedException(\RuntimeException::class);

        FocalLength::fromMM('foo');
    }

    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFocalLengthConstructionNormalizesArgument()
    {
        $focalLength = new FocalLength('350/10');

        $this->assertEquals(
            '35mm',
            $focalLength->getStringData()
        );
    }

    /**
     * @covers ::fromFocalLength
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFocalLengthReturnsNewInstanceWithSameData()
    {
        $original = new FocalLength('500/10');
        $copy = FocalLength::fromFocalLength($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            FocalLength::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }

    /**
     * @covers ::fromMM
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMMReturnsNewInstanceWithCorrectData()
    {
        $instance = FocalLength::fromMM('35mm');

        $this->assertInstanceOf(
            FocalLength::class,
            $instance
        );

        $this->assertEquals(
            '35mm',
            $instance->getStringData()
        );
    }
}
