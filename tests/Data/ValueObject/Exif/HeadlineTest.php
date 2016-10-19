<?php

namespace Tests\PHPExif\Common\Data\ValueObject\Exif;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Exif\Headline;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Exif\Headline
 * @covers ::<!public>
 */
class HeadlineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testHeadlineIsInstanceOfStringObject()
    {
        $headline = new Headline('Some headline');
        $this->assertInstanceOf(
            StringObject::class,
            $headline
        );
    }

    /**
     * @covers ::fromHeadline
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromHeadlineReturnsNewInstanceWithSameData()
    {
        $original = new Headline('Some headline');
        $copy = Headline::fromHeadline($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Headline::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
