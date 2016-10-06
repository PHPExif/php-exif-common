<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Mapper\MapperNotRegisteredException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Mapper\MapperNotRegisteredException
 * @covers ::<!public>
 */
class MapperNotRegisteredExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::forField
     */
    public function testForFieldReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            MapperNotRegisteredException::class,
            'forField',
            array('foo')
        );
    }
}
