<?php
/**
 * PHP Exif Caption ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject\Exif;

use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Caption class
 *
 * A value object to describe the Caption data
 *
 * @category    PHPExif
 * @package     Common
 */
class Caption extends StringObject
{
    /**
     * Creates a new instance from given Caption object
     *
     * @param Caption $caption
     *
     * @return Caption
     */
    public static function fromCaption(Caption $caption)
    {
        return new self(
            (string) $caption
        );
    }
}
