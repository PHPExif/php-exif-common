<?php
/**
 * PHP Exif Credit ValueObject
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
 * Credit class
 *
 * A value object to describe the Credit data
 *
 * @category    PHPExif
 * @package     Common
 */
class Credit extends StringObject
{
    /**
     * Creates a new instance from given Credit object
     *
     * @param Credit $credit
     *
     * @return Credit
     */
    public static function fromCredit(Credit $credit)
    {
        return new self(
            (string) $credit
        );
    }
}
