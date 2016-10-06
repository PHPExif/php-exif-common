<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Collection\InvalidElementTypeException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Collection\InvalidElementTypeException
 * @covers ::<!public>
 */
class InvalidElementTypeExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::withExpectedType
     */
    public function testWithExpectedTypeReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            InvalidElementTypeException::class,
            'withExpectedType',
            array('foo')
        );
    }
}
