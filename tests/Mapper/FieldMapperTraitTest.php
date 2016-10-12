<?php

namespace Tests\PHPExif\Common\Mapper;

use Mockery as m;
use PHPExif\Common\Exception\Mapper\MapperNotRegisteredException;
use PHPExif\Common\Mapper\FieldMapper;
use PHPExif\Common\Mapper\FieldMapperTrait;

/**
 * Class: FieldMapperTraitTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Mapper\FieldMapperTrait
 * @covers ::<!public>
 */
class FieldMapperTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::registerFieldMappers
     * @group mapper
     *
     * @return void
     */
    public function testRegisterFieldMappersRegistersIndividualMappers()
    {
        $mock = $this->getMockBuilder(FieldMapperTrait::class)
            ->setMethods(['registerFieldMapper'])
            ->getMockForTrait();

        $mapper = $this->getMockBuilder(FieldMapper::class)
            ->getMock();
        $mappers = array($mapper);
        $mock->expects($this->exactly(count($mappers)))
            ->method('registerFieldMapper');

        $mock->registerFieldMappers($mappers);
    }

    /**
     * @covers ::registerFieldMapper
     * @group mapper
     *
     * @return void
     */
    public function testRegisterFieldMapperKeepsTrackOfSupportedFields()
    {
        $mock = $this->getMockBuilder(FieldMapperTrait::class)
            ->getMockForTrait();


        $mapper = $this->getMockBuilder(FieldMapper::class)
            ->setMethods(['getSupportedFields', 'mapField'])
            ->getMock();

        $mapper->expects($this->once())
            ->method('getSupportedFields')
            ->will(
                $this->returnValue(array('foo'))
            );

        $this->assertFalse(
            $mock->mapperRegisteredForField('foo')
        );

        $mock->registerFieldMapper($mapper);

        $this->assertTrue(
            $mock->mapperRegisteredForField('foo')
        );
    }

    /**
     * @covers ::mapperRegisteredForField
     * @group mapper
     *
     * @return void
     */
	public function testMapperRegisteredForFieldReturnsFalseWhenMapperNotAdded()
	{
        $mock = $this->getMockBuilder(FieldMapperTrait::class)
            ->getMockForTrait();

		$this->assertFalse($mock->mapperRegisteredForField('foo'));
	}

    /**
     * @covers ::mapperRegisteredForField
     * @group mapper
     *
     * @return void
     */
	public function testMapperRegisteredForFieldReturnsTrueWhenMapperIsAdded()
	{
        $mock = $this->getMockBuilder(FieldMapperTrait::class)
            ->getMockForTrait();


        $mapper = $this->getMockBuilder(FieldMapper::class)
            ->setMethods(['getSupportedFields', 'mapField'])
            ->getMock();

        $mapper->expects($this->once())
            ->method('getSupportedFields')
            ->will(
                $this->returnValue(array('foo'))
            );

        $mock->registerFieldMapper($mapper);

        $this->assertTrue(
            $mock->mapperRegisteredForField('foo')
        );
	}

    /**
     * @covers ::getFieldMapper
     * @group mapper
     *
     * @return void
     */
	public function testGetFieldMapperThrowsExceptionForUnknownField()
	{
        $mock = $this->getMockBuilder(FieldMapperTrait::class)
            ->getMockForTrait();

        $this->expectException(MapperNotRegisteredException::class);

		$mock->getFieldMapper('foo');
	}

    /**
     * @covers ::getFieldMapper
     * @group mapper
     *
     * @return void
     */
	public function testGetFieldMapperReturnsCorrectFieldMapper()
	{
        $mock = $this->getMockBuilder(FieldMapperTrait::class)
            ->getMockForTrait();


        $mapper = $this->getMockBuilder(FieldMapper::class)
            ->setMethods(['getSupportedFields', 'mapField'])
            ->getMock();

        $mapper->expects($this->once())
            ->method('getSupportedFields')
            ->will(
                $this->returnValue(array('foo'))
            );

        $mock->registerFieldMapper($mapper);

		$result = $mock->getFieldMapper('foo');

		$this->assertSame(
			$mapper,
			$result
		);
	}
}
