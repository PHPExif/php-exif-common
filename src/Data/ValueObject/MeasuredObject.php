<?php
/**
 * PHP Exif MeasuredObject abstract ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject;

use \JsonSerializable;

/**
 * MeasuredObject class
 *
 * Describes a measured object
 *
 * @category    PHPExif
 * @package     Common
 */
abstract class MeasuredObject implements JsonSerializable
{
    /**
     * Contains the value
     *
     * @var mixed
     */
    protected $value;

    /**
     * Contains the unit of measurement
     *
     * @var Unit
     */
    protected $unit;

    /**
     * @param mixed $value
     * @param Unit $unit
     *
     * @throws InvalidArgumentException If given data is not an integer
     */
    public function __construct($value, Unit $unit)
    {
        $this->setValue($value);
        $this->setUnit($unit);
    }

    /**
     * Sets the value
     *
     * @param mixed $value
     *
     * @return void
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Sets the unit
     *
     * @param Unit $unit
     *
     * @return void
     */
    protected function setUnit(Unit $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Getter for value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Getter for unit
     *
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return [
            'value' => $this->getValue(),
            'unit' => (string) $this->getUnit(),
        ];
    }

    /**
     * Returns string representation
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue() . (string) $this->getUnit();
    }
}
