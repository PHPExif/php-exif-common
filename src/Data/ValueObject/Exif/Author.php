<?php
/**
 * PHP Exif Author ValueObject
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
 * Author class
 *
 * A value object to describe the Author data
 *
 * @category    PHPExif
 * @package     Common
 */
class Author extends StringObject
{
    /**
     * Creates a new instance from given Author object
     *
     * @param Author $author
     *
     * @return Author
     */
    public static function fromAuthor(Author $author)
    {
        return new self(
            (string) $author
        );
    }
}
