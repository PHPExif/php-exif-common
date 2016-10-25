<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\Copyright;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\Copyright
 * @covers ::<!public>
 */
class CopyrightTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testCopyrightIsInstanceOfStringObject()
    {
        $copyright = new Copyright('Copyright (c) Tom Van Herreweghe');
        $this->assertInstanceOf(
            StringObject::class,
            $copyright
        );
    }

    /**
     * @covers ::fromCopyright
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromCopyrightReturnsNewInstanceWithSameData()
    {
        $original = new Copyright('Copyright (c) Tom Van Herreweghe');
        $copy = Copyright::fromCopyright($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Copyright::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
