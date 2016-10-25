<?php
/**
 * PHP Exif Model ValueObject
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
 * Model class
 *
 * A value object to describe the Model data
 *
 * @category    PHPExif
 * @package     Common
 */
class Model extends StringObject
{
    /**
     * Creates a new instance from given Model object
     *
     * @param Model $model
     *
     * @return Model
     */
    public static function fromModel(Model $model)
    {
        return new self(
            (string) $model
        );
    }
}
