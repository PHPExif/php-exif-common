<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Source;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Source
 * @covers ::<!public>
 */
class SourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testSourceIsInstanceOfStringObject()
    {
        $source = new Source('Some source line');
        $this->assertInstanceOf(
            StringObject::class,
            $source
        );
    }

    /**
     * @covers ::fromSource
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromSourceReturnsNewInstanceWithSameData()
    {
        $original = new Source('Some source line');
        $copy = Source::fromSource($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Source::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
