<?php
/**
 * ReaderInterface: Defines a public interface for reading EXIF data
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
 * ReaderInterface
 *
 * Public API for reading EXIF data
 *
 * @category    PHPExif
 * @package     Common
 */
interface ReaderInterface
{
    /**
     * Accessor for the data mapper
     *
     * @return MapperInterface
     */
    public function getMapper();

    /**
     * Read the available metadata of given file
     *
     * @param string $filePath
     *
     * @return MetadataInterface
     */
    public function getMetadataFromFile($filePath);
}
