<?php
/**
 * PHP Exif Coordinates ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject;

use \InvalidArgumentException;
use \JsonSerializable;
use \RuntimeException;

/**
 * Coordinates class
 *
 * A value object to describe the coordinates of an image
 *
 * @category    PHPExif
 * @package     Common
 */
class Coordinates implements JsonSerializable
{
    /**
     * The latitude
     *
     * @var DigitalDegrees
     */
    private $latitude;

    /**
     * The longitude
     *
     * @var DigitalDegrees
     */
    private $longitude;

    /**
     * @param DigitalDegrees $latitude
     * @param DigitalDegrees $longitude
     */
    public function __construct(DigitalDegrees $latitude, DigitalDegrees $longitude)
    {
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
    }

    /**
     * Sets the latitude
     *
     * @param DigitalDegrees $latitude
     *
     * @return void
     */
    private function setLatitude(DigitalDegrees $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Sets the longitude
     *
     * @param DigitalDegrees $longitude
     *
     * @return void
     */
    private function setLongitude(DigitalDegrees $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Getter for latitude
     *
     * @return DigitalDegrees
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Getter for longitude
     *
     * @return DigitalDegrees
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Creates a new instance from given Coordinates object
     *
     * @param Coordinates $coordinates
     *
     * @return Coordinates
     */
    public static function fromCoordinates(Coordinates $coordinates)
    {
        return new self(
            (clone $coordinates->getLatitude()),
            (clone $coordinates->getLongitude())
        );
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return [
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
        ];
    }

    /**
     * Returns string representation
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%1$s,%2$s',
            (string) $this->getLatitude(),
            (string) $this->getLongitude()
        );
    }
}
