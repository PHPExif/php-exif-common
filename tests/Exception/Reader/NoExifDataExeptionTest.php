<?php

namespace Tests\PHPExif\Common\Exception\Collection;

use PHPExif\Common\Exception\Reader\NoExifDataException;
use Tests\PHPExif\Common\Exception\BaseExceptionTest;

/**
 * @coversDefaultClass \PHPExif\Common\Exception\Reader\NoExifDataException
 * @covers ::<!public>
 */
class NoExifDataExceptionTest extends BaseExceptionTest
{
    /**
     * @group exception
     * @covers ::fromFile
     */
    public function testFromFileReturnsInstance()
    {
        $this->assertNamedConstructorReturnsInstance(
            NoExifDataException::class,
            'fromFile',
            array(
                '/foo/bar/file.jpg'
            )
        );
    }
}
