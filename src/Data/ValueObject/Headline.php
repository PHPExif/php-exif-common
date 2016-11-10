<?php
/**
 * PHP Exif Headline ValueObject
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
 * Headline class
 *
 * A value object to describe the Headline data
 *
 * @category    PHPExif
 * @package     Common
 */
class Headline extends StringObject
{
    /**
     * Creates a new instance from given Headline object
     *
     * @param Headline $headline
     *
     * @return Headline
     */
    public static function fromHeadline(Headline $headline)
    {
        return new self(
            (string) $headline
        );
    }
}
