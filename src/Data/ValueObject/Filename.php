<?php
/**
 * PHP Exif Filename ValueObject
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
 * Filename class
 *
 * A value object to describe the Filename data
 *
 * @category    PHPExif
 * @package     Common
 */
class Filename extends StringObject
{
    /**
     * Creates a new instance from given Filename object
     *
     * @param Filename $filename
     *
     * @return Filename
     */
    public static function fromFilename(Filename $filename)
    {
        return new self(
            (string) $filename
        );
    }
}
