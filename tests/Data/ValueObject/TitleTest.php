<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Title;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Title
 * @covers ::<!public>
 */
class TitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testTitleIsInstanceOfStringObject()
    {
        $title = new Title('What a great title');
        $this->assertInstanceOf(
            StringObject::class,
            $title
        );
    }

    /**
     * @covers ::fromTitle
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromTitleReturnsNewInstanceWithSameData()
    {
        $original = new Title('This is a title');
        $copy = Title::fromTitle($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Title::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
