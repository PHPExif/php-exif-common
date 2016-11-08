<?php
/**
 * PHP Exif HorizontalResolution ValueObject
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
 * HorizontalResolution class
 *
 * A value object to describe the HorizontalResolution data
 *
 * @category    PHPExif
 * @package     Common
 */
class HorizontalResolution extends Resolution
{
    /**
     * Creates a new instance from given Resolution object
     *
     * @param HorizontalResolution $Resolution
     *
     * @return HorizontalResolution
     */
    public static function fromHorizontalResolution(HorizontalResolution $resolution)
    {
        return new self(
            $resolution->getValue() . '/1'
        );
    }
}
