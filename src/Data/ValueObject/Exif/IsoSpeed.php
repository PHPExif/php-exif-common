<?php
/**
 * PHP Exif IsoSpeed ValueObject
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
 * IsoSpeed class
 *
 * A value object to describe the IsoSpeed data
 *
 * @category    PHPExif
 * @package     Common
 */
class IsoSpeed extends IntegerObject
{
    /**
     * Creates a new instance from given IsoSpeed object
     *
     * @param IsoSpeed $isoSpeed
     *
     * @return IsoSpeed
     */
    public static function fromIsoSpeed(IsoSpeed $isoSpeed)
    {
        return new self(
            $isoSpeed->getValue()
        );
    }
}
