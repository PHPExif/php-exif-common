<?php
/**
 * Trait with method to validate arguments of ::mapField
 * from Exif\*Mapper classes
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Mapper;

use PHPExif\Common\Data\ExifInterface;
use PHPExif\Common\Exception\Mapper\UnsupportedFieldException;
use PHPExif\Common\Exception\Mapper\UnsupportedOutputException;

/**
 * Common method to check the arguments of an Exif\* mapper
 *
 * @category    PHPExif
 * @package     Common
 */
trait GuardInvalidArgumentsForExifTrait
{
    /**
     * Guard function for invalid arguments
     *
     * @codeCoverageIgnore
     *
     * @param string $field
     * @param array $input
     * @param object $output
     *
     * @throws UnsupportedFieldException when asked to map an unsupported field
     * @throws UnsupportedOutputException when asked to map data on an unsupported output object
     *
     * @return void
     */
    private function guardInvalidArguments($field, array $input, $output)
    {
        if (!in_array($field, $this->getSupportedFields())) {
            throw UnsupportedFieldException::forField($field);
        }

        if (!($output instanceof ExifInterface)) {
            throw UnsupportedOutputException::forOutput($output);
        }
    }

    /**
     * {@inheritDoc}
     */
    abstract public function getSupportedFields();
}
