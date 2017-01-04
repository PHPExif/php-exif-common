<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Filesize;

/**
 * Class: FilesizeTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Filesize
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

    /**
     * @covers ::fromMegaBytesString
     * @dataProvider fromMBSWrongArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesStringFailsWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = Filesize::fromMegaBytesString($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromMBSWrongArgs()
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
     * @covers ::fromMegaBytesString
     * @dataProvider fromMBSWrongStringArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesStringFailsWhenNotStringHasWrongFormat($arg)
    {
        $this->expectException(\RuntimeException::class);
        $instance = Filesize::fromMegaBytesString($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromMBSWrongStringArgs()
    {
        return [
            ['5.4 mb'],
            ['5.4 Mb'],
            ['foobar'],
            ['5,4 MB'],
        ];
    }

    /**
     * @covers ::fromMegaBytesString
     * @dataProvider fromMegaBytesStringCorrectArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesStringDoesntFailsWhenStringHasCorrectFormat($arg)
    {
        try {
            $instance = Filesize::fromMegaBytesString($arg);
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
    public function fromMegaBytesStringCorrectArgs()
    {
        return [
            ['5MB'],
            ['5 MB'],
            ['5.4MB'],
            ['5.4 MB'],
        ];
    }

    /**
     * @covers ::fromMegaBytesString
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesStringReturnsInstance()
    {
        $instance = Filesize::fromMegaBytesString('5.4 MB');
        $this->assertInstanceOf(
            Filesize::class,
            $instance
        );
    }

    /**
     * @covers ::fromMegaBytes
     * @dataProvider fromMBWrongArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesFailsWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = Filesize::fromMegaBytes($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromMBWrongArgs()
    {
        return [
            ['foo'],
            [false],
            [true],
            [null],
            [[]],
            [(new \stdClass)],
            [function () {}],
        ];
    }

    /**
     * @covers ::fromMegaBytes
     * @dataProvider fromMegaBytesCorrectArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesDoesntFailsWhenStringHasCorrectFormat($arg)
    {
        try {
            $instance = Filesize::fromMegaBytes($arg);
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
    public function fromMegaBytesCorrectArgs()
    {
        return [
            [5],
            [5.4],
        ];
    }

    /**
     * @covers ::fromMegaBytes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromMegaBytesReturnsInstance()
    {
        $instance = Filesize::fromMegaBytes(5.4);
        $this->assertInstanceOf(
            Filesize::class,
            $instance
        );
    }

    /**
     * @covers ::fromKiloBytesString
     * @dataProvider fromKBSWrongArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesStringFailsWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = Filesize::fromKiloBytesString($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromKBSWrongArgs()
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
     * @covers ::fromKiloBytesString
     * @dataProvider fromKBSWrongStringArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesStringFailsWhenNotStringHasWrongFormat($arg)
    {
        $this->expectException(\RuntimeException::class);
        $instance = Filesize::fromKiloBytesString($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromKBSWrongStringArgs()
    {
        return [
            ['5.4 kb'],
            ['5.4 Kb'],
            ['foobar'],
            ['5,4 KB'],
        ];
    }

    /**
     * @covers ::fromKiloBytesString
     * @dataProvider fromKiloBytesStringCorrectArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesStringDoesntFailsWhenStringHasCorrectFormat($arg)
    {
        try {
            $instance = Filesize::fromKiloBytesString($arg);
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
    public function fromKiloBytesStringCorrectArgs()
    {
        return [
            ['5KB'],
            ['5 KB'],
            ['5.4KB'],
            ['5.4 KB'],
        ];
    }

    /**
     * @covers ::fromKiloBytesString
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesStringReturnsInstance()
    {
        $instance = Filesize::fromKiloBytesString('5.4 KB');
        $this->assertInstanceOf(
            Filesize::class,
            $instance
        );
    }

    /**
     * @covers ::fromKiloBytes
     * @dataProvider fromKBWrongArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesFailsWhenNotStringArgument($arg)
    {
        $this->expectException(\InvalidArgumentException::class);
        $instance = Filesize::fromKiloBytes($arg);
    }

    /**
     * Data Provider
     *
     * @return array
     */
    public function fromKBWrongArgs()
    {
        return [
            ['foo'],
            [false],
            [true],
            [null],
            [[]],
            [(new \stdClass)],
            [function () {}],
        ];
    }

    /**
     * @covers ::fromKiloBytes
     * @dataProvider fromKiloBytesCorrectArgs
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesDoesntFailsWhenStringHasCorrectFormat($arg)
    {
        try {
            $instance = Filesize::fromKiloBytes($arg);
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
    public function fromKiloBytesCorrectArgs()
    {
        return [
            [5],
            [5.4],
        ];
    }

    /**
     * @covers ::fromKiloBytes
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKiloBytesReturnsInstance()
    {
        $instance = Filesize::fromKiloBytes(5.4);
        $this->assertInstanceOf(
            Filesize::class,
            $instance
        );
    }
}
