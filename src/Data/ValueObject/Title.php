<?php
/**
 * PHP Exif Title ValueObject
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
 * Title class
 *
 * A value object to describe the Title data
 *
 * @category    PHPExif
 * @package     Common
 */
class Title extends StringObject
{
    /**
     * Creates a new instance from given Title object
     *
     * @param Title $title
     *
     * @return Title
     */
    public static function fromTitle(Title $title)
    {
        return new self(
            (string) $title
        );
    }
}
