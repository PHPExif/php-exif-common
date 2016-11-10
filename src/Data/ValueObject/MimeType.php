<?php
/**
 * PHP Exif MimeType ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject;

use PHPExif\Common\Data\ValueObject\StringObject;
use \InvalidArgumentException;
use \RuntimeException;

/**
 * MimeType class
 *
 * A value object to describe the MimeType data
 *
 * @category    PHPExif
 * @package     Common
 */
class MimeType extends StringObject
{
    /**
     * @param string $stringData
     *
     * @throws InvalidArgumentException If given string is not really a string
     * @throws RuntimeExcpetion If given string is in incorrect format
     */
    public function __construct($stringData)
    {
        if (!is_string($stringData)) {
            throw new InvalidArgumentException('Given data is not a string');
        }

        if (!preg_match('#^image/(jpeg|gif|tiff|bmp)$#', $stringData, $matches)) {
            throw new RuntimeException('Given MimeType is not in a valid format. Need: "image/<type>"');
        }

        $this->setStringData($stringData);
    }

    /**
     * Creates a new instance from given MimeType object
     *
     * @param MimeType $mimeType
     *
     * @return MimeType
     */
    public static function fromMimeType(MimeType $mimeType)
    {
        return new self(
            (string) $mimeType
        );
    }
}
