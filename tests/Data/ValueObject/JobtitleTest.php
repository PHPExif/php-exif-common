<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Jobtitle;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Jobtitle
 * @covers ::<!public>
 */
class JobtitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testJobtitleIsInstanceOfStringObject()
    {
        $jobtitle = new Jobtitle('Philip Roth');
        $this->assertInstanceOf(
            StringObject::class,
            $jobtitle
        );
    }

    /**
     * @covers ::fromJobtitle
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromJobtitleReturnsNewInstanceWithSameData()
    {
        $original = new Jobtitle('J. D. Salinger');
        $copy = Jobtitle::fromJobtitle($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Jobtitle::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
