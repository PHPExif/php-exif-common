<?php
/**
 * PHP Exif ExposureTime ValueObject
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
use \InvalidArgumentException;
use \RuntimeException;

/**
 * ExposureTime class
 *
 * A value object to describe the ExposureTime data
 *
 * @category    PHPExif
 * @package     Common
 */
class ExposureTime extends StringObject
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

        if (!preg_match('#^([0-9]+)/([0-9]+)s?$#', $stringData, $matches)) {
            throw new RuntimeException('Given exposure time is not in a valid format. Need: "1/<number>" or "1/<number>s"');
        }

        $numerator = (int) $matches[1];
        $denominator = (int) $matches[2];

        // normalize:
        $denominator /= $numerator;

        $this->setStringData("1/{$denominator}");
    }

    /**
     * Creates a new instance from given ExposureTime object
     *
     * @param ExposureTime $exposureTime
     *
     * @return ExposureTime
     */
    public static function fromExposureTime(ExposureTime $exposureTime)
    {
        return new self(
            (string) $exposureTime
        );
    }
}
