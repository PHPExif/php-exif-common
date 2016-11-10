<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Aperture;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Aperture
 * @covers ::<!public>
 */
class ApertureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @dataProvider constructorExceptionProvider
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionThrowsExceptionWhenNotFloatArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = new Aperture($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function constructorExceptionProvider()
    {
        return [
            ['foo'],
            ['5.6'],
            [false],
            [true],
            [null],
            [array()],
            [new \stdClass],
            [function () {}],
        ];
    }

    /**
     * @covers ::__construct
     * @dataProvider constructorAllowedArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionAllowsFloatOrInt($arg)
    {
        try {
            $instance = new Aperture($arg);
        } catch (\Exception $e) {
            $this->fail('No exception should occur');
        }
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function constructorAllowedArgs()
    {
        return [
            [5.6],
            [8],
        ];
    }

    /**
     * @covers ::getFNumber
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorRetrievesSetFNumber()
    {
        $aperture = new Aperture(5.6);
        $this->assertEquals(
            5.6,
            $aperture->getFNumber()
        );
    }

    /**
     * @covers ::fromFocalLength
     * @dataProvider fromFocalLengthWrongArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFocalLengthFailsWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = Aperture::fromFocalLength($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromFocalLengthWrongArgs()
    {
        $list = $this->constructorExceptionProvider();
        $list[0] = [5.6];

        unset($list[1]); // '5.6'

        return $list;
    }

    /**
     * @covers ::fromFocalLength
     * @dataProvider fromFocalLengthWrongStringArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFocalLengthFailsWhenNotStringHasWrongFormat($arg)
    {
        $this->expectException(\RuntimeException::class);
        $instance = Aperture::fromFocalLength($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromFocalLengthWrongStringArgs()
    {
        return [
            ['F/5.6'],
            ['foobar'],
            ['af/5.6'],
        ];
    }

    /**
     * @covers ::fromFocalLength
     * @dataProvider fromFocalLengthCorrectArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFocalLengthDoesntFailsWhenStringHasCorrectFormat($arg)
    {
        try {
            $instance = Aperture::fromFocalLength($arg);
        } catch (\Exception $e) {
            $this->fail(
                sprintf(
                    'Expected format "%1$s" to succeed',
                    $arg
                )
            );
        }
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromFocalLengthCorrectArgs()
    {
        return [
            ['f/5.6'],
            ['f/8'],
        ];
    }

    /**
     * @covers ::fromFocalLength
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFocalLengthReturnsInstance()
    {
        $instance = Aperture::fromFocalLength('f/5.6');
        $this->assertInstanceOf(
            Aperture::class,
            $instance
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
    public function testFromFocalLengthDoesNotManipulateTheData()
    {
        $instance = Aperture::fromFocalLength('f/8');
        $this->assertInternalType(
            'int',
            $instance->getFNumber()
        );
        $this->assertEquals(
            8,
            $instance->getFNumber()
        );

        $instance = Aperture::fromFocalLength('f/5.6');
        $this->assertInternalType(
            'float',
            $instance->getFNumber()
        );
        $this->assertEquals(
            5.6,
            $instance->getFNumber()
        );
    }

    /**
     * @covers ::fromAperture
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromApertureReturnsNewInstanceWithSameData()
    {
        $original = new Aperture(5.6);
        $copy = Aperture::fromAperture($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Aperture::class,
            $copy
        );

        $this->assertEquals(
            $original->getFNumber(),
            $copy->getFNumber()
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
        $aperture = new Aperture(5.6);
        $json = json_encode($aperture);

        $this->assertEquals(
            json_encode('f/5.6'),
            $json
        );
    }

    /**
     * @covers ::__toString
     * @dataProvider stringifyExpectedValues
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testToStringReturnsCorrectStringVersion($fNumber, $focalLength)
    {
        $aperture = new Aperture($fNumber);
        $this->assertEquals(
            $focalLength,
            (string) $aperture
        );
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function stringifyExpectedValues()
    {
        return [
            [
                5.6,
                'f/5.6',
            ],
            [
                8,
                'f/8',
            ],
            [
                128,
                'f/128',
            ],
        ];
    }
}
