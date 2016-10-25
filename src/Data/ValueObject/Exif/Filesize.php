<?php
/**
 * PHP Exif Filesize ValueObject
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
 * Filesize class
 *
 * A value object to describe the Filesize
 *
 * @category    PHPExif
 * @package     Common
 */
class Filesize implements JsonSerializable
{
    /**
     * The filesize in bytes
     *
     * @var int
     */
    private $bytes;

    /**
     * @param int $bytes
     *
     * @throws InvalidArgumentException If given bytes are not an integer
     */
    public function __construct($bytes)
    {
        if (!is_int($bytes)) {
            throw new InvalidArgumentException('Given amount in bytes must be an integer');
        }

        $this->setBytes($bytes);
    }

    /**
     * Sets the bytes
     *
     * @param int $bytes
     *
     * @return void
     */
    private function setBytes($bytes)
    {
        $this->bytes = $bytes;
    }

    /**
     * Getter for bytes
     *
     * @return int
     */
    public function getBytes()
    {
        return $this->bytes;
    }

    /**
     * Returns the filesize in KiloBytes
     *
     * @return float
     */
    public function getKiloBytes()
    {
        return ($this->getBytes() / 1024);
    }

    /**
     * Returns the filesize in MegaBytes
     *
     * @return float
     */
    public function getMegaBytes()
    {
        return ($this->getKiloBytes() / 1024);
    }

    /**
     * Returns the filesize in GigaBytes
     *
     * @return float
     */
    public function getGigaBytes()
    {
        return ($this->getMegaBytes() / 1024);
    }

    /**
     * Creates a new instance from given Filesize object
     *
     * @param Filesize $filesize
     *
     * @return Filesize
     */
    public static function fromFilesize(Filesize $filesize)
    {
        return new self(
            $filesize->getBytes()
        );
    }

    /**
     * @inheritDoc
     *
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->getBytes();
    }

    /**
     * Returns string representation
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getBytes();
    }
}
