<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Mapper\UnsupportedOutputException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Mapper\UnsupportedOutputException
 * @covers ::<!public>
 */
class UnsupportedOutputExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::forOutput
     */
    public function testForFieldReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            UnsupportedOutputException::class,
            'forOutput',
            array(
                (new \stdClass)
            )
        );
    }
}
