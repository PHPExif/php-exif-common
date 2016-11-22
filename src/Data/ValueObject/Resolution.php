<?php
/**
 * PHP Exif Resolution ValueObject
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
 * Resolution class
 *
 * A value object to describe the resolution of an image
 *
 * @category    PHPExif
 * @package     Common
 */
class Resolution implements JsonSerializable
{
    /**
     * The horizontal line resolution
     *
     * @var LineResolution
     */
    private $horizontal;

    /**
     * The vertical line resolution
     *
     * @var LineResolution
     */
    private $vertical;

    /**
     * @param LineResolution $horizontal
     * @param LineResolution $vertical
     */
    public function __construct(LineResolution $horizontal, LineResolution $vertical)
    {
        $this->setHorizontal($horizontal);
        $this->setVertical($vertical);
    }

    /**
     * Sets the horizontal resolution
     *
     * @param LineResolution $horizontal
     *
     * @return void
     */
    private function setHorizontal(LineResolution $horizontal)
    {
        $this->horizontal = $horizontal;
    }

    /**
     * Sets the vertical resolution
     *
     * @param LineResolution $vertical
     *
     * @return void
     */
    private function setVertical(LineResolution $vertical)
    {
        $this->vertical = $vertical;
    }

    /**
     * Getter for horizontal
     *
     * @return LineResolution
     */
    public function getHorizontalResolution()
    {
        return $this->horizontal;
    }

    /**
     * Getter for vertical
     *
     * @return LineResolution
     */
    public function getVerticalResolution()
    {
        return $this->vertical;
    }

    /**
     * Creates a new instance from given Resolution object
     *
     * @param Resolution $resolution
     *
     * @return Resolution
     */
    public static function fromResolution(Resolution $resolution)
    {
        return new self(
            (clone $resolution->getHorizontalResolution()),
            (clone $resolution->getVerticalResolution())
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
            'horizontal' => $this->getHorizontalResolution(),
            'vertical' => $this->getVerticalResolution(),
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
            (string) $this->getHorizontalResolution(),
            (string) $this->getVerticalResolution()
        );
    }
}
