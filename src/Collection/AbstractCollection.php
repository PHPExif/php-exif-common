<?php
/**
 * Abstract implementation of a Collection
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
 * AbstractCollection class
 *
 * @category    PHPExif
 * @package     Common
 */
abstract class AbstractCollection implements Collection
{
    /**
     * Holds the entries of the collection
     *
     * @var array
     */
    private $elements;

    /**
     * Collection constructor
     *
     * @param array $data
     */
    public function __construct(array $elements = array())
    {
        $this->elements = array();

        foreach ($elements as $name => $config) {
            $this->add($name, $config);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function add($key, $value)
    {
        if ($this->exists($key)) {
            throw ElementAlreadyExistsException::withKey($key);
        }

        $this->elements[$key] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function exists($key)
    {
        return array_key_exists($key, $this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        if (!$this->exists($key)) {
            throw ElementNotExistsException::withKey($key);
        }

        return $this->element[$key];
    }
}
