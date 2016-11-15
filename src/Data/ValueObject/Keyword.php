<?php
/**
 * PHP Exif Keyword ValueObject
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

/**
 * Keyword class
 *
 * A value object to describe the Keyword data
 *
 * @category    PHPExif
 * @package     Common
 */
class Keyword extends StringObject
{
    /**
     * Creates a new instance from given Keyword object
     *
     * @param Keyword $keyword
     *
     * @return Keyword
     */
    public static function fromKeyword(Keyword $keyword)
    {
        return new self(
            (string) $keyword
        );
    }
}
