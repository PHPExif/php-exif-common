<?php
/**
 * Mapper for mapping data between raw input and Data classes
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
 * Mapper
 *
 * @category    PHPExif
 * @package     Exif
 */
trait FieldMapperTrait
{
    /**
     * @var FieldMapper[]
     */
    private $fieldMappers = array();

    /**
     * {@inheritDoc}
     */
    public function registerFieldMappers(array $fieldMappers)
    {
        foreach ($fieldMappers as $fieldMapper) {
            $this->registerFieldMapper($fieldMapper);
        }
    }

    /**
     * Registers given FieldMapper instance
     * Allows overwriting an already existing mapper for a given field
     *
     * @param FieldMapper $fieldMapper
     *
     * @return void
     */
    public function registerFieldMapper(FieldMapper $fieldMapper)
    {
        $targetFields = $fieldMapper->getSupportedFields();

        foreach ($targetFields as $fieldName) {
            $this->fieldMappers[$fieldName] = $fieldMapper;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getFieldMapper($field)
    {
        if (!$this->mapperRegisteredForField($field)) {
            throw MapperNotRegisteredException::forField($field);
        }

        return $this->fieldMappers[$field];
    }

    /**
     * {@inheritDoc}
     */
    public function getFieldMappers()
    {
        return $this->fieldMappers;
    }

    /**
     * {@inheritDoc}
     */
    public function mapperRegisteredForField($field)
    {
        return array_key_exists($field, $this->fieldMappers);
    }
}
