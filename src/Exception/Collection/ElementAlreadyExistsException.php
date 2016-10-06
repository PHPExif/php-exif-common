<?php
/**
 * ElementAlreadyExists exception class
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Exception\Collection;

/**
 * ElementAlreadyExistsException
 *
 * @category    PHPExif
 * @package     Common
 */
class ElementAlreadyExistsException extends \Exception
{
    /**
     * Returns new instance with message set
     *
     * @param string $key
     *
     * @return ElementAlreadyExistsException
     */
    public static function withKey($key)
    {
        return new self(
            sprintf(
                'An element with is already present for key "%1$s"',
                $key
            )
        );
    }
}
