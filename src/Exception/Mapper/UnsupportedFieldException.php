<?php
/**
 * UnsupportedFieldException for when an unsupported field was given to the fieldmapper
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Exception\Mapper;

/**
 * UnsupportedFieldException
 *
 * @category    PHPExif
 * @package     Common
 */
class UnsupportedFieldException extends \Exception
{
    /**
     * Returns new instance with set message
     *
     * @param string $field
     * @return UnsupportedFieldException
     */
    public static function forField($field)
    {
        return new self(
            sprintf(
                'Mapper does not support field "%1$s"',
                $field
            )
        );
    }
}
