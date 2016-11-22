<?php
/**
 * PHP Exif DigitalDegrees ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject;

use PHPExif\Common\Data\ValueObject\FloatObject;

/**
 * DigitalDegrees class
 *
 * A value object to describe the DigitalDegrees data
 *
 * @category    PHPExif
 * @package     Common
 */
class DigitalDegrees extends FloatObject
{
    /**
     * Creates a new instance from given DigitalDegrees object
     *
     * @param DigitalDegrees $digitalDegrees
     *
     * @return DigitalDegrees
     */
    public static function fromDigitalDegrees(DigitalDegrees $digitalDegrees)
    {
        return new self(
            $digitalDegrees->getValue()
        );
    }
}
