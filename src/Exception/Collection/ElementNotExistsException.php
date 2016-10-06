<?php
/**
 * ElementNotExists exception class
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
 * ElementNotExistsException
 *
 * @category    PHPExif
 * @package     Common
 */
class ElementNotExistsException extends \Exception
{
    /**
     * Returns new instance with message set
     *
     * @param string $key
     *
     * @return ElementNotExistsException
     */
    public static function withKey($key)
    {
        return new self(
            sprintf(
                'No element is present in the collection with key "%1$s"',
                $key
            )
        );
    }
}
