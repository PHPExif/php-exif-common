<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Collection\ElementAlreadyExistsException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Collection\ElementAlreadyExistsException
 * @covers ::<!public>
 */
class ElementAlreadyExistsExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::withKey
     */
    public function testWithKeyReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            ElementAlreadyExistsException::class,
            'withKey',
            array('foo')
        );
    }
}
