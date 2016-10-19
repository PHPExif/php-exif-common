<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\MimeType;
use PHPExif\Common\Data\ValueObject\StringObject;
use \InvalidArgumentException;
use \RuntimeException;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\MimeType
 * @covers ::<!public>
 */
class MimeTypeTest extends \PHPUnit_Framework_TestCase
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
    public function testConstructionThrowsExceptionWhenNotStringArgument($arg)
    {
        $this->expectException(InvalidArgumentException::class);
        new MimeType($arg);
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
    public function testConstructionThrowsExceptionWhenArgumentIncorrectFormat()
    {
        $this->expectException(RuntimeException::class);
        new MimeType('foo');
    }

    /**
     * @covers ::__construct
     * @dataProvider constructorSupportedTypes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testConstructionShouldNotThrowExceptionForCorrectFormat($arg)
    {
        try {
            new MimeType($arg);
        } catch (\Exception $e) {
            $this->fail('Construction was not supposed to fail');
        }
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function constructorSupportedTypes()
    {
        return [
            ['image/jpeg'],
            ['image/gif'],
            ['image/tiff'],
            ['image/bmp'],
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
    public function testMimeTypeIsInstanceOfStringObject()
    {
        $mimeType = new MimeType('image/jpeg');
        $this->assertInstanceOf(
            StringObject::class,
            $mimeType
        );
    }

    /**
     * @covers ::fromMimeType
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMimeTypeReturnsNewInstanceWithSameData()
    {
        $original = new MimeType('image/jpeg');
        $copy = MimeType::fromMimeType($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            MimeType::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
