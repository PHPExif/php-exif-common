<?php
/**
 * InvalidElementType exception class
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
 * InvalidElementTypeException
 *
 * @category    PHPExif
 * @package     Common
 */
class InvalidElementTypeException extends \Exception
{
    /**
     * Returns new instance with message set
     *
     * @param string $type
     *
     * @return InvalidElementTypeException
     */
    public static function withExpectedType($type)
    {
        return new self(
            sprintf(
                'Only elements of type "%1$s" are allowed in the collection',
                $type
            )
        );
    }
}
