<?php
/**
 * PHP Exif Make ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject;

use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Make class
 *
 * A value object to describe the Make data
 *
 * @category    PHPExif
 * @package     Common
 */
class Make extends StringObject
{
    /**
     * Creates a new instance from given Make object
     *
     * @param Make $make
     *
     * @return Make
     */
    public static function fromMake(Make $make)
    {
        return new self(
            (string) $make
        );
    }
}
