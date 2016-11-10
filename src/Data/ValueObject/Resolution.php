<?php
/**
 * PHP Exif Resolution ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data\ValueObject;

use PHPExif\Common\Data\ValueObject\IntegerObject;
use \InvalidArgumentException;
use \RuntimeException;

/**
 * Resolution class
 *
 * A value object to describe the Resolution data
 *
 * @category    PHPExif
 * @package     Common
 */
abstract class Resolution extends IntegerObject
{
    /**
     * @param string $stringData
     *
     * @throws InvalidArgumentException If given argument is not a string
     */
    public function __construct($stringData)
    {
        if (!is_string($stringData)) {
            throw new InvalidArgumentException('Given data is not a string');
        }

        if (!preg_match('#^([0-9]+)/([0-9]+)$#', $stringData, $matches)) {
            throw new RuntimeException('Given resolution is not in a valid format. Need: "<number>/<number>"');
        }

        $numerator = (int) $matches[1];
        $denominator = (int) $matches[2];

        // normalize:
        $numerator /= $denominator;

        $this->setValue($numerator);
    }
}
