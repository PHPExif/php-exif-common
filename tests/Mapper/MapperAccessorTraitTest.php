<?php

namespace Tests\PHPExif\Common\Mapper;

use Mockery as m;
use PHPExif\Common\Adapter\MapperInterface;
use PHPExif\Common\Exception\Mapper\NoMapperSetException;
use PHPExif\Common\Mapper\MapperAccessorTrait;

/**
 * Class: MapperAccessorTraitTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Mapper\MapperAccessorTrait
 * @covers ::<!public>
 */
class MapperAccessorTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getMapper
     * @group mapper
     *
     * @return void
     */
    public function testGetMapperThrowsExceptionIfNoneSet()
    {
        $this->expectException(NoMapperSetException::class);
        $mock = $this->getMockBuilder(MapperAccessorTrait::class)
            ->getMockForTrait();

        $mock->getMapper();
    }

    /**
     * @covers ::setMapper
     * @covers ::getMapper
     * @group mapper
     *
     * @return void
     */
    public function testGetMapperReturnsInstanceWhenSet()
    {
        $mock = $this->getMockBuilder(MapperAccessorTrait::class)
            ->getMockForTrait();
        $mapper = m::mock(MapperInterface::class);

        $mock->setMapper($mapper);
        $result = $mock->getMapper();

        $this->assertSame(
            $mapper,
            $result
        );
    }
}
