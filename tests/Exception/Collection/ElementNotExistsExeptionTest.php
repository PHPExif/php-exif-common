<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Collection\ElementNotExistsException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Collection\ElementNotExistsException
 * @covers ::<!public>
 */
class ElementNotExistsExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::withKey
     */
    public function testWithKeyReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            ElementNotExistsException::class,
            'withKey',
            array('foo')
        );
    }
}
