<?php

namespace Tests\PHPExif\Common\Collection;

use Mockery as m;
use PHPExif\Common\Collection\AbstractCollection;
use PHPExif\Common\Exception\Collection\ElementAlreadyExistsException;
use PHPExif\Common\Exception\Collection\ElementNotExistsException;

/**
 * Class: AbstractCollectionTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Collection\AbstractCollection
 * @covers ::<!public>
 */
class AbstractCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @group collection
     *
     * @return void
     */
    public function testConstructorAddsElementsFromParameter()
    {
        $input = array(
            'foo' => 'bar',
            'baz' => 'quux',
        );
        $ctr = array(
            'key' => 0,
            'value' => 0,
        );

        $checker = function ($type) use ($input, &$ctr) {
            return function ($arg) use ($input, $type, &$ctr) {
                $result = false;

                $data = null;
                if ($type === 'key') {
                    $data = array_keys($input);
                } else {
                    $data = array_values($input);
                }

                if ($arg === $data[$ctr[$type]]) {
                    $result = true;
                }

                $ctr[$type]++;

                return $result;
            };
        };

        $mock = m::mock(
            AbstractCollection::class
        )->shouldDeferMissing();
        $mock->shouldReceive('add')
            ->with(
                m::on(
                    $checker('key')
                ),
                m::on(
                    $checker('value')
                )
            )
            ->andReturnNull();

        $mock->__construct($input);

        $this->assertEquals(
            count($input),
            $ctr['key']
        );
        $this->assertEquals(
            count($input),
            $ctr['value']
        );
    }

    /**
     * @covers ::add
     * @group collection
     *
     * @return void
     */
    public function testAddThrowsExceptionForExistingKey()
    {
        $this->expectException(ElementAlreadyExistsException::class);

        $mock = m::mock(
            AbstractCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(true);

        $mock->add('foo', 'bar');
    }

    /**
     * @covers ::add
     * @group collection
     *
     * @return void
     */
    public function testAddReturnsCurrentInstance()
    {
        $mock = m::mock(
            AbstractCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(false);

        $result = $mock->add('foo', 'bar');

        $this->assertSame(
            $mock,
            $result
        );
    }

    /**
     * @covers ::add
     * @group collection
     *
     * @return void
     */
    public function testAddInsertsInCollection()
    {
        $mock = m::mock(
            AbstractCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(false);

        $this->assertEquals(
            0,
            $mock->count()
        );

        $mock->add('foo', 'bar');

        $this->assertEquals(
            1,
            $mock->count()
        );
    }

    /**
     * @covers ::exists
     * @group collection
     *
     * @return void
     */
    public function testExistsCorrectlyDeterminesExistenceOfKey()
    {
        $mock = m::mock(
            AbstractCollection::class,
            array()
        )->shouldDeferMissing();

        $this->assertFalse(
            $mock->exists('foo')
        );

        $mock->add('foo', 'bar');

        $this->assertTrue(
            $mock->exists('foo')
        );
    }

    /**
     * @covers ::count
     * @group collection
     *
     * @return void
     */
    public function testCountReturnsCollectionCount()
    {
        $mock = m::mock(
            AbstractCollection::class,
            array()
        )->shouldDeferMissing();

        $this->assertEquals(
            0,
            $mock->count()
        );

        $mock->add('foo', 'bar');

        $this->assertEquals(
            1,
            $mock->count()
        );
    }

    /**
     * @covers ::get
     * @group collection
     *
     * @return void
     */
    public function testGetThrowsExceptionForNotExistingKey()
    {
        $this->expectException(ElementNotExistsException::class);

        $mock = m::mock(
            AbstractCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(false);

        $mock->get('foo');
    }

    /**
     * @covers ::get
     * @group collection
     *
     * @return void
     */
    public function testGetReturnsCorrectData()
    {
        $mock = m::mock(
            AbstractCollection::class,
            array()
        )->shouldDeferMissing();

        $data = new \stdClass;
        $mock->add('foo', $data);
        $result = $mock->get('foo');

        $this->assertSame(
            $data,
            $result
        );
    }
}
