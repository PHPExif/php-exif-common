<?php
/**
 * Accessor & Mutator for Mapper
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Mapper;

use PHPExif\Common\Adapter\MapperInterface;
use PHPExif\Common\Exception\Mapper\NoMapperSetException;

/**
 * MapperAccessorTrait
 *
 * @category    PHPExif
 * @package     Common
 */
trait MapperAccessorTrait
{
    /**
     * @var MapperInterface
     */
    private $mapper;

    /**
     * {@inheritDoc}
     */
    public function getMapper()
    {
        if (null !== $this->mapper) {
            return $this->mapper;
        }

        throw new NoMapperSetException;
    }

    /**
     * {@inheritDoc}
     */
    public function setMapper(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }
}
