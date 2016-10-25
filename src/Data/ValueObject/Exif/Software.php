<?php
/**
 * PHP Exif Software ValueObject
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Data\ValueObject\Exif;

use PHPExif\Common\Data\ValueObject\StringObject;

/**
 * Software class
 *
 * A value object to describe the Software data
 *
 * @category    PHPExif
 * @package     Common
 */
class Software extends StringObject
{
    /**
     * Creates a new instance from given Software object
     *
     * @param Software $software
     *
     * @return Software
     */
    public static function fromSoftware(Software $software)
    {
        return new self(
            (string) $software
        );
    }
}
