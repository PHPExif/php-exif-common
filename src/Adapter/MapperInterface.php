<?php
/**
 * PHP Exif Mapper Interface: Defines the interface for data mappers
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Adapter;

use PHPExif\Common\Data\MetadataInterface;

/**
 * MapperInterface
 *
 * Public API for mapping raw EXIF data
 * to and from Exif
 *
 * @category    PHPExif
 * @package     Common
 */
interface MapperInterface
{
    /**
     * Maps the array of raw source data to the correct
     * value objects
     *
     * @param array $input
     * @param MetadataInterface $output
     *
     * @return void
     */
    public function map(array $input, MetadataInterface $output);
}
