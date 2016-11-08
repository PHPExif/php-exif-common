<?php
/**
 * PHP Exif FocalLength ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data\ValueObject\Exif;

use PHPExif\Common\Data\ValueObject\StringObject;
use \InvalidArgumentException;
use \RuntimeException;

/**
 * FocalLength class
 *
 * A value object to describe the FocalLength data
 *
 * @category    PHPExif
 * @package     Common
 */
class FocalLength extends StringObject
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
            throw new RuntimeException('Given focal length is not in a valid format. Need: "<number>/<number>"');
        }

        $numerator = (int) $matches[1];
        $denominator = (int) $matches[2];

        // normalize:
        $numerator /= $denominator;

        $this->setStringData("{$numerator}mm");
    }

    /**
     * Creates new instance with data in milimeter
     *
     * @param string $stringData
     *
     * @return FocalLength
     */
    public static function fromMM($stringData)
    {
        if (!is_string($stringData)) {
            throw new InvalidArgumentException('Given data is not a string');
        }

        if (!preg_match('#^([0-9]+)mm$#', $stringData, $matches)) {
            throw new RuntimeException('Given focal length is not in a valid format. Need: "<number>mm"');
        }

        $numerator = $matches[1];

        return new self(
            "{$numerator}/1"
        );
    }

    /**
     * Creates a new instance from given FocalLength object
     *
     * @param FocalLength $focalLength
     *
     * @return FocalLength
     */
    public static function fromFocalLength(FocalLength $focalLength)
    {
        return self::fromMM($focalLength->getStringData());
    }
}
