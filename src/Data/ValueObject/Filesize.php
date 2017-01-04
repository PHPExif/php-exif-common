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

namespace PHPExif\Common\Data\ValueObject;

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
     * Creates instance from a megabyte string notation
     * Examples:
     *
     *   - '5MB'
     *   - '5 MB'
     *   - '5.4MB'
     *   - '5.4 MB'
     *
     * @param string $filesize
     *
     * @return Filesize
     */
    public static function fromMegaBytesString($filesize)
    {
        if (!is_string($filesize)) {
            throw new InvalidArgumentException('Given filesize must be a string');
        }

        if (!preg_match('#^([0-9]*\.[0-9]+|[0-9]*)\s?MB$#', $filesize, $matches)) {
            throw new RuntimeException('Given filesize is not in a valid format. Need: "<float> MB"');
        }

        $megabytes = $matches[1];

        if (($filtered = filter_var($megabytes, FILTER_VALIDATE_INT)) !== false) {
            $megabytes = $filtered;
        } else {
            $megabytes = (float) $megabytes;
        }

        return self::fromMegaBytes($megabytes);
    }

    /**
     * Creates new instance from megabyte amount
     * Examples:
     *
     *   - 5
     *   - 5.4
     *
     * @param int|float $megabytes
     *
     * @return Filesize
     */
    public static function fromMegaBytes($megabytes)
    {
        if (!is_int($megabytes) && !is_float($megabytes)) {
            throw new InvalidArgumentException('Given amount must be an integer or a float');
        }

        $bytes = $megabytes * pow(1024, 2);

        return new self((int) round($bytes, 0));
    }

    /**
     * Creates instance from a kilobyte string notation
     * Examples:
     *
     *   - '5KB'
     *   - '5 KB'
     *   - '5.4KB'
     *   - '5.4 KB'
     *
     * @param string $filesize
     *
     * @return Filesize
     */
    public static function fromKiloBytesString($filesize)
    {
        if (!is_string($filesize)) {
            throw new InvalidArgumentException('Given filesize must be a string');
        }

        if (!preg_match('#^([0-9]*\.[0-9]+|[0-9]*)\s?KB$#', $filesize, $matches)) {
            throw new RuntimeException('Given filesize is not in a valid format. Need: "<float> KB"');
        }

        $kilobytes = $matches[1];

        if (($filtered = filter_var($kilobytes, FILTER_VALIDATE_INT)) !== false) {
            $kilobytes = $filtered;
        } else {
            $kilobytes = (float) $kilobytes;
        }

        return self::fromKiloBytes($kilobytes);
    }

    /**
     * Creates new instance from kilobyte amount
     * Examples:
     *
     *   - 5
     *   - 5.4
     *
     * @param int|float $kilobytes
     *
     * @return Filesize
     */
    public static function fromKiloBytes($kilobytes)
    {
        if (!is_int($kilobytes) && !is_float($kilobytes)) {
            throw new InvalidArgumentException('Given amount must be an integer or a float');
        }

        $bytes = $kilobytes * 1024;

        return new self((int) round($bytes, 0));
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
