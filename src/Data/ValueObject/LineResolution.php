<?php
/**
 * PHP Exif LineResolution ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data\ValueObject;

use \InvalidArgumentException;
use \RuntimeException;

/**
 * LineResolution class
 *
 * A value object to describe the LineResolution data
 *
 * @category    PHPExif
 * @package     Common
 */
class LineResolution extends MeasuredObject
{
    /**
     * @inheritDoc
     *
     * @throws InvalidArgumentException If given argument is not a string
     */
    public function __construct($value, Unit $unit)
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('Given value is not a string');
        }

        if (!preg_match('#^([0-9]+)/([0-9]+)$#', $value, $matches)) {
            throw new RuntimeException('Given resolution is not in a valid format. Need: "<number>/<number>"');
        }

        $numerator = (int) $matches[1];
        $denominator = (int) $matches[2];

        // normalize:
        $numerator /= $denominator;

        $this->setValue($numerator);
        $this->setUnit($unit);
    }

    /**
     * Creates a new instance from given Resolution object
     *
     * @param LineResolution $resolution
     *
     * @return LineResolution
     */
    public static function fromLineResolution(LineResolution $resolution)
    {
        return new self(
            $resolution->getValue() . '/1',
            (clone $resolution->getUnit())
        );
    }

    /**
     * Creates a new instance with given value and a
     * Unit of "dpi"
     *
     * @param mixed $value
     *
     * @return LineResolution
     */
    public static function dpi($value)
    {
        return new self(
            $value,
            new Unit('dpi')
        );
    }
}
