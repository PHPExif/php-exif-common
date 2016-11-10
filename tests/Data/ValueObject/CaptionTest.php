<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Caption
 * @covers ::<!public>
 */
class CaptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testCaptionIsInstanceOfStringObject()
    {
        $caption = new Caption('What a great title');
        $this->assertInstanceOf(
            StringObject::class,
            $caption
        );
    }

    /**
     * @covers ::fromCaption
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromCaptionReturnsNewInstanceWithSameData()
    {
        $original = new Caption('This is a caption');
        $copy = Caption::fromCaption($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Caption::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
