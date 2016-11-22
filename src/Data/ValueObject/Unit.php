<?php
/**
 * PHP Exif Unit ValueObject
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
 * Unit class
 *
 * A value object to describe a unit of measurement
 *
 * @category    PHPExif
 * @package     Common
 */
class Unit extends StringObject
{
    /**
     * Creates a new instance from given Unit object
     *
     * @param Unit $unit
     *
     * @return Unit
     */
    public static function fromUnit(Unit $unit)
    {
        return new self(
            (string) $unit
        );
    }
}
