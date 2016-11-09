<?php
/**
 * NoExifDataException implementation
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Exception\Reader;

/**
 * NoExifDataException
 *
 * @category    PHPExif
 * @package     Common
 */
class NoExifDataException extends \Exception
{
    /**
     * Could not read EXIF data from given path
     *
     * @param string $path
     *
     * @return NoExifDataException
     */
    public static function fromFile($path)
    {
        return new self(
            sprintf(
                'Could not read EXIF data from file %1$s',
                $path
            )
        );
    }
}
