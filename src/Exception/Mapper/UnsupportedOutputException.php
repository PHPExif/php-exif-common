<?php
/**
 * UnsupportedOutputException for when an unsupported output was given to the mapper
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Exception\Mapper;

/**
 * UnsupportedOutputException
 *
 * @category    PHPExif
 * @package     Common
 */
class UnsupportedOutputException extends \Exception
{
    /**
     * Returns new instance with set message
     *
     * @param object $output
     * @return UnsupportedOutputException
     */
    public static function forOutput($output)
    {
        return new self(
            sprintf(
                'Mapper does not support output objects of type "%1$s"',
                get_class($output)
            )
        );
    }
}
