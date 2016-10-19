<?php
/**
 * PHP Exif General String ValueObject
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
 * Author class
 *
 * A value object to describe the Author data
 *
 * @category    PHPExif
 * @package     Common
 */
abstract class StringObject implements JsonSerializable
{
    /**
     * Contains the string data
     *
     * @var string
     */
    protected $stringData;

    /**
     * @param string $stringData
     *
     * @throws InvalidArgumentException If given f-number is not a string
     */
    public function __construct($stringData)
    {
        if (!is_string($stringData)) {
            throw new InvalidArgumentException('Given data is not a string');
        }

        $this->setStringData($stringData);
    }

    /**
     * Sets the stringData
     *
     * @param string $stringData
     *
     * @return void
     */
    protected function setStringData($stringData)
    {
        $this->stringData = $stringData;
    }

    /**
     * Getter for stringData
     *
     * @return string
     */
    public function getStringData()
    {
        return $this->stringData;
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
        return $this->getStringData();
    }
}
