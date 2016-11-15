<?php
/**
 * Collection interface defines public api for a collection
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Collection;

use PHPExif\Common\Exception\Collection\ElementAlreadyExistsException;
use PHPExif\Common\Exception\Collection\ElementNotExistsException;

/**
 * Collection interface
 *
 * Public API for a collection of elements
 *
 * @category    PHPExif
 * @package     Common
 */
interface Collection
{
    /**
     * Adds a $value to the elements
     *
     * @param mixed $value
     *
     * @return Collection
     */
    public function add($value);

    /**
     * Adds a $value to the elements with key $key
     *
     * @param string $key
     * @param mixed $value
     *
     * @throws ElementAlreadyExistsException When element with $name is
     * already present in the collection
     *
     * @return Collection
     */
    public function set($key, $value);

    /**
     * Determines if element with given key exists in the collection
     *
     * @param string $key
     *
     * @return bool
     */
    public function exists($key);

    /**
     * Retrieves element with given key
     *
     * @throws ElementNotExistsException When requested key is not present
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Returns the amount of elements in the collection
     *
     *
     * @return int
     */
    public function count();
}
