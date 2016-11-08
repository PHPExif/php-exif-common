<?php
/**
 * PHP Exif Height ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject\Exif;

use PHPExif\Common\Data\ValueObject\IntegerObject;

/**
 * Height class
 *
 * A value object to describe the Height data
 *
 * @category    PHPExif
 * @package     Common
 */
class Height extends IntegerObject
{
    /**
     * Creates a new instance from given Height object
     *
     * @param Height $height
     *
     * @return Height
     */
    public static function fromHeight(Height $height)
    {
        return new self(
            $height->getValue()
        );
    }
}
