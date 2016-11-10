<?php
/**
 * PHP Exif Width ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject;

use PHPExif\Common\Data\ValueObject\IntegerObject;

/**
 * Width class
 *
 * A value object to describe the Width data
 *
 * @category    PHPExif
 * @package     Common
 */
class Width extends IntegerObject
{
    /**
     * Creates a new instance from given Width object
     *
     * @param Width $width
     *
     * @return Width
     */
    public static function fromWidth(Width $width)
    {
        return new self(
            $width->getValue()
        );
    }
}
