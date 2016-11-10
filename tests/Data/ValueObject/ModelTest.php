<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Model;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Model
 * @covers ::<!public>
 */
class ModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testModelIsInstanceOfStringObject()
    {
        $model = new Model('NIKON D90');
        $this->assertInstanceOf(
            StringObject::class,
            $model
        );
    }

    /**
     * @covers ::fromModel
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromModelReturnsNewInstanceWithSameData()
    {
        $original = new Model('NIKON D90');
        $copy = Model::fromModel($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Model::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
