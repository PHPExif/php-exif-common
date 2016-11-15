<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Keyword;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Keyword
 * @covers ::<!public>
 */
class KeywordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testKeywordIsInstanceOfStringObject()
    {
        $keyword = new Keyword('foo');
        $this->assertInstanceOf(
            StringObject::class,
            $keyword
        );
    }

    /**
     * @covers ::fromKeyword
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromKeywordReturnsNewInstanceWithSameData()
    {
        $original = new Keyword('bar');
        $copy = Keyword::fromKeyword($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Keyword::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
