<?php
/**
 * PHP Exif Aperture ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject\Exif;

use \InvalidArgumentException;
use \JsonSerializable;
use \RuntimeException;

/**
 * Aperture class
 *
 * A value object to describe the Aperture f-number
 *
 * @category    PHPExif
 * @package     Common
 */
class Aperture implements JsonSerializable
{
    /**
     * The f-number
     *
     * @see https://en.wikipedia.org/wiki/F-number
     *
     * @var float
     */
    private $fNumber;

    /**
     * @param float $fNumber
     *
     * @throws InvalidArgumentException If given f-number is not a float
     */
    public function __construct($fNumber)
    {
        if (!is_float($fNumber) && !is_int($fNumber)) {
            throw new InvalidArgumentException('fNumber must be an integer or float');
        }

        $this->setFNumber($fNumber);
    }

    /**
     * Sets the fNumber
     *
     * @param float|int $fNumber
     *
     * @return void
     */
    private function setFNumber($fNumber)
    {
        $this->fNumber = $fNumber;
    }

    /**
     * Getter for fNumber
     *
     * @return string
     */
    public function getFNumber()
    {
        return $this->fNumber;
    }

    /**
     * Creates new instance from given Focal Length format
     *
     * Format:
     *          f/<f-number>
     *
     * @param string $focalLength
     *
     * @throws \InvalidArgumentException If focalLength is not a string
     *
     * @return Aperture
     */
    public static function fromFocalLength($focalLength)
    {
        if (!is_string($focalLength)) {
            throw new InvalidArgumentException('focalLength must be a string');
        }

        if (!preg_match('#^f/([0-9]*\.[0-9]+|[0-9]*)$#', $focalLength, $matches)) {
            throw new RuntimeException('Given focalLength is not in a valid format. Need: "f/<number>"');
        }

        $fNumber = $matches[1];

        if (($filtered = filter_var($fNumber, FILTER_VALIDATE_INT)) !== false) {
            $fNumber = $filtered;
        } else {
            $fNumber = (float) $fNumber;
        }

        return new self($fNumber);
    }

    /**
     * Creates a new instance from given Aperture object
     *
     * @param Aperture $aperture
     *
     * @return Aperture
     */
    public static function fromAperture(Aperture $aperture)
    {
        return new self(
            $aperture->getFNumber()
        );
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return (string) $this;
    }

    /**
     * Returns string representation
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'f/%1$s',
            $this->getFNumber()
        );
    }
}
