<?php
/**
 * MapperNotRegisteredException for when an expected mapper was not found
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Exception\Mapper;

/**
 * MapperNotRegisteredException
 *
 * @category    PHPExif
 * @package     Common
 */
class MapperNotRegisteredException extends \Exception
{
    /**
     * Returns new instance with set message
     *
     * @param string $field
     * @return MapperNotRegisteredException
     */
    public static function forField($field)
    {
        return new self(
            sprintf(
                'No mapper was registered for field "%1$s"',
                $field
            )
        );
    }
}
