<?php
/**
 * PHP Exif FocusDistance ValueObject
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
 * FocusDistance class
 *
 * A value object to describe the FocusDistance data
 *
 * @category    PHPExif
 * @package     Common
 */
class FocusDistance extends StringObject
{
    /**
     * Creates a new instance from given FocusDistance object
     *
     * @param FocusDistance $focusDistance
     *
     * @return FocusDistance
     */
    public static function fromFocusDistance(FocusDistance $focusDistance)
    {
        return new self(
            (string) $focusDistance
        );
    }
}
