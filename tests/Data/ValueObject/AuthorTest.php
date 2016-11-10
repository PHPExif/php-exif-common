<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Author;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Author
 * @covers ::<!public>
 */
class AuthorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testAuthorIsInstanceOfStringObject()
    {
        $author = new Author('Philip Roth');
        $this->assertInstanceOf(
            StringObject::class,
            $author
        );
    }

    /**
     * @covers ::fromAuthor
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromAuthorReturnsNewInstanceWithSameData()
    {
        $original = new Author('J. D. Salinger');
        $copy = Author::fromAuthor($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Author::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
