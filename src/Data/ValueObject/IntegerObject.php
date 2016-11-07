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
 * IntegerObject class
 *
 * Abstract class for objects with only integer data
 *
 * @category    PHPExif
 * @package     Common
 */
abstract class IntegerObject implements JsonSerializable
{
    /**
     * Contains the value
     *
     * @var int
     */
    protected $value;

    /**
     * @param int $value
     *
     * @throws InvalidArgumentException If given data is not an integer
     */
    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new InvalidArgumentException('Given data is not an integer');
        }

        $this->setValue($value);
    }

    /**
     * Sets the value
     *
     * @param int $value
     *
     * @return void
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Getter for value
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return (int) $this->getValue();
    }

    /**
     * Returns string representation
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
    }
}
