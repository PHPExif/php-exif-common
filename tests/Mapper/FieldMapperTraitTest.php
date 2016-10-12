<?php

namespace Tests\PHPExif\Common\Mapper;

use BetterReflection\Reflection\ReflectionProperty;
use Mockery as m;
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
}
