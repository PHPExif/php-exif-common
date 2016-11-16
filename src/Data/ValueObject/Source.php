<?php
/**
 * PHP Exif Source ValueObject
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
 * Source class
 *
 * A value object to describe the Source data
 *
 * @category    PHPExif
 * @package     Common
 */
class Source extends StringObject
{
    /**
     * Creates a new instance from given Source object
     *
     * @param Source $source
     *
     * @return Source
     */
    public static function fromSource(Source $source)
    {
        return new self(
            (string) $source
        );
    }
}
