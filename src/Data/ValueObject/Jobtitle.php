<?php
/**
 * PHP Exif Jobtitle ValueObject
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
 * Jobtitle class
 *
 * A value object to describe the Jobtitle data
 *
 * @category    PHPExif
 * @package     Common
 */
class Jobtitle extends StringObject
{
    /**
     * Creates a new instance from given Jobtitle object
     *
     * @param Jobtitle $jobtitle
     *
     * @return Jobtitle
     */
    public static function fromJobtitle(Jobtitle $jobtitle)
    {
        return new self(
            (string) $jobtitle
        );
    }
}
