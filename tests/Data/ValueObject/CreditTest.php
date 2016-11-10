<?php

namespace Tests\PHPExif\Common\Data\ValueObject;

use Mockery as m;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Class: ApertureTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\ValueObject\Credit
 * @covers ::<!public>
 */
class CreditTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testCreditIsInstanceOfStringObject()
    {
        $credit = new Credit('Some credit line');
        $this->assertInstanceOf(
            StringObject::class,
            $credit
        );
    }

    /**
     * @covers ::fromCredit
     * @group data
     * @group valueobject
     * @group exif
     *
     * @return void
     */
    public function testFromCreditReturnsNewInstanceWithSameData()
    {
        $original = new Credit('Some credit line');
        $copy = Credit::fromCredit($original);

        $this->assertNotSame(
            $original,
            $copy
        );
        $this->assertInstanceOf(
            Credit::class,
            $copy
        );

        $this->assertEquals(
            $original->getStringData(),
            $copy->getStringData()
        );
    }
}
