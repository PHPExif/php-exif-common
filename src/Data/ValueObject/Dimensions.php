<?php
/**
 * PHP Exif Dimensions ValueObject
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
 * Aperture class
 *
 * A value object to describe the Aperture f-number
 *
 * @category    PHPExif
 * @package     Common
 */
class Dimensions implements JsonSerializable
{
    /**
     * The width
     *
     * @var Width
     */
    private $width;

    /**
     * The height
     *
     * @var Height
     */
    private $height;

    public function __construct(Width $width, Height $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * Sets the width
     *
     * @param Width $width
     *
     * @return void
     */
    private function setWidth(Width $width)
    {
        $this->width = $width;
    }

    /**
     * Sets the height
     *
     * @param Height $height
     *
     * @return void
     */
    private function setHeight(Height $height)
    {
        $this->height = $height;
    }

    /**
     * Getter for width
     *
     * @return Width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Getter for height
     *
     * @return Height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Creates a new instance from given Dimensions object
     *
     * @param Dimensions $dimensions
     *
     * @return Dimensions
     */
    public static function fromDimensions(Dimensions $dimensions)
    {
        return new self(
            (clone $dimensions->getWidth()),
            (clone $dimensions->getHeight())
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
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
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
            '%1$s x %2$s',
            (string) $this->getWidth(),
            (string) $this->getHeight()
        );
    }
}
