<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Mapper\UnsupportedFieldException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Mapper\UnsupportedFieldException
 * @covers ::<!public>
 */
class UnsupportedFieldExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::forField
     */
    public function testForFieldReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            UnsupportedFieldException::class,
            'forField',
            array(
                'foo'
            )
        );
    }
}
