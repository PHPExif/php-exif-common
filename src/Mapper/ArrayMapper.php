<?php
/**
 * PHP Exif ArrayMapper Interface: Defines the interface for mapping an array of data
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 * @codeCoverageIgnore
 */

namespace PHPExif\Common\Mapper;

use PHPExif\Common\Exception\Mapper\MapperNotRegisteredException;

/**
 * ArrayMapper
 *
 * Public API for mapping an array of EXIF data
 * to and from Exif
 *
 * @category    PHPExif
 * @package     Common
 */
interface ArrayMapper
{
    /**
     * Register given list of FieldMapper instances
     *
     * @param FieldMapper[]|array $fieldMappers
     * @return void
     */
    public function registerFieldMappers(array $fieldMappers);

    /**
     * Determines if a mapper is registered for given field
     *
     * @param string $field
     * @return bool
     */
    public function mapperRegisteredForField($field);

    /**
     * Returns the mapper associated with given field
     *
     * @param string $field
     *
     * @throws MapperNotRegisteredException when no mapper is registered for given field
     *
     * @return FieldMapper
     */
    public function getFieldMapper($field);

    /**
     * Returns the complete list of registered FieldMappers
     *
     * @return array
     */
    public function getFieldMappers();

    /**
     * Maps given input on given output
     *
     * @param array $input
     * @param object $output
     *
     * @return void
     */
    public function mapArray(array $input, &$output);
}
