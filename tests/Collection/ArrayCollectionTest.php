<?php

namespace Tests\PHPExif\Common\Collection;

use Mockery as m;
use PHPExif\Common\Collection\ArrayCollection;
use PHPExif\Common\Exception\Collection\ElementAlreadyExistsException;
use PHPExif\Common\Exception\Collection\ElementNotExistsException;

/**
 * Class: ArrayCollectionTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Collection\ArrayCollection
 * @covers ::<!public>
 */
class ArrayCollectionTest extends \PHPUnit_Framework_TestCase
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
            ArrayCollection::class
        )->shouldDeferMissing();
        $mock->shouldReceive('set')
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
    public function testAddReturnsCurrentInstance()
    {
        $collection = new ArrayCollection;
        $result = $collection->add('foo');

        $this->assertSame(
            $collection,
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
        $collection = new ArrayCollection;

        $this->assertEquals(
            0,
            $collection->count()
        );

        $collection->add('foo');

        $this->assertEquals(
            1,
            $collection->count()
        );
    }

    /**
     * @covers ::set
     * @group collection
     *
     * @return void
     */
    public function testAddThrowsExceptionForExistingKey()
    {
        $this->expectException(ElementAlreadyExistsException::class);

        $mock = m::mock(
            ArrayCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(true);

        $mock->set('foo', 'bar');
    }

    /**
     * @covers ::set
     * @group collection
     *
     * @return void
     */
    public function testSetReturnsCurrentInstance()
    {
        $mock = m::mock(
            ArrayCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(false);

        $result = $mock->set('foo', 'bar');

        $this->assertSame(
            $mock,
            $result
        );
    }

    /**
     * @covers ::set
     * @group collection
     *
     * @return void
     */
    public function testSetInsertsInCollection()
    {
        $mock = m::mock(
            ArrayCollection::class . '[exists]',
            array()
        )->shouldDeferMissing();
        $mock->shouldReceive('exists')
            ->with('foo')
            ->andReturn(false);

        $this->assertEquals(
            0,
            $mock->count()
        );

        $mock->set('foo', 'bar');

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
        $collection = new ArrayCollection;

        $this->assertFalse(
            $collection->exists('foo')
        );

        $collection->set('foo', 'bar');

        $this->assertTrue(
            $collection->exists('foo')
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
        $collection = new ArrayCollection;

        $this->assertEquals(
            0,
            $collection->count()
        );

        $collection->set('foo', 'bar');

        $this->assertEquals(
            1,
            $collection->count()
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
            ArrayCollection::class . '[exists]',
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
        $collection = new ArrayCollection;

        $data = new \stdClass;
        $collection->set('foo', $data);
        $result = $collection->get('foo');

        $this->assertSame(
            $data,
            $result
        );
    }
}
