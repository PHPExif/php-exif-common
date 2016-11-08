<?php
/**
 * PHP Exif VerticalResolution ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data\ValueObject\Exif;

use PHPExif\Common\Data\ValueObject\IntegerObject;
use \InvalidArgumentException;
use \RuntimeException;

/**
 * VerticalResolution class
 *
 * A value object to describe the VerticalResolution data
 *
 * @category    PHPExif
 * @package     Common
 */
class VerticalResolution extends Resolution
{
    /**
     * Creates a new instance from given Resolution object
     *
     * @param VerticalResolution $resolution
     *
     * @return VerticalResolution
     */
    public static function fromVerticalResolution(VerticalResolution $resolution)
    {
        return new self(
            $resolution->getValue() . '/1'
        );
    }
}
