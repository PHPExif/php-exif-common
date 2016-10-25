<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\Filesize;

/**
 * Class: FilesizeTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\Filesize
 * @covers ::<!public>
 */
class FilesizeTest extends \PHPUnit_Framework_TestCase
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
    public function testConstructionThrowsExceptionWhenNotIntegerArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = new Filesize($arg);
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
            [5.6],
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
    public function testConstructionAllowsInteger($arg)
    {
        try {
            $instance = new Filesize($arg);
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
            [10598],
        ];
    }

    /**
     * @covers ::getBytes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAccessorRetrievesSetBytes()
    {
        $filesize = new Filesize(4587962);
        $this->assertEquals(
            4587962,
            $filesize->getBytes()
        );
    }

    /**
     * @covers ::getKiloBytes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testGetKiloBytesCorrectlyConverts()
    {
        $filesize = new Filesize(5541247);
        $this->assertEquals(
            5541247/1024,
            $filesize->getKiloBytes()
        );
    }

    /**
     * @covers ::getMegaBytes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testGetMegaBytesCorrectlyConverts()
    {
        $filesize = new Filesize(5541247);
        $this->assertEquals(
            5541247/pow(1024, 2),
            $filesize->getMegaBytes()
        );
    }

    /**
     * @covers ::getGigaBytes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testGetGigaBytesCorrectlyConverts()
    {
        $filesize = new Filesize(5541247);
        $this->assertEquals(
            5541247/pow(1024, 3),
            $filesize->getGigaBytes()
        );
    }

    /**
     * @covers ::fromFilesize
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromFilesizeReturnsNewInstanceWithSameData()
    {
        $original = new Filesize(9874574);
        $copy = Filesize::fromFilesize($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Filesize::class,
            $copy
        );

        $this->assertEquals(
            $original->getBytes(),
            $copy->getBytes()
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
        $filesize = new Filesize(124784);
        $json = json_encode($filesize);

        $this->assertEquals(
            json_encode(124784),
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
    public function testToStringReturnsCorrectStringVersion($bytes, $byteString)
    {
        $filesize = new Filesize($bytes);
        $this->assertEquals(
            $byteString,
            (string) $filesize
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
                665478,
                '665478',
            ],
        ];
    }
}
