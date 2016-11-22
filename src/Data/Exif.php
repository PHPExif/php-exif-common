<?php
/**
 * Exif: A container class for EXIF data
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data;

use PHPExif\Common\Data\ValueObject\Aperture;
use PHPExif\Common\Data\ValueObject\Author;
use PHPExif\Common\Data\ValueObject\Coordinates;
use PHPExif\Common\Data\ValueObject\Dimensions;
use PHPExif\Common\Data\ValueObject\ExposureTime;
use PHPExif\Common\Data\ValueObject\Filename;
use PHPExif\Common\Data\ValueObject\Filesize;
use PHPExif\Common\Data\ValueObject\FocalLength;
use PHPExif\Common\Data\ValueObject\FocusDistance;
use PHPExif\Common\Data\ValueObject\IsoSpeed;
use PHPExif\Common\Data\ValueObject\LineResolution;
use PHPExif\Common\Data\ValueObject\Make;
use PHPExif\Common\Data\ValueObject\MimeType;
use PHPExif\Common\Data\ValueObject\Model;
use PHPExif\Common\Data\ValueObject\Resolution;
use PHPExif\Common\Data\ValueObject\Software;
use \DateTimeImmutable;

/**
 * Exif class
 *
 * Container for EXIF data
 *
 * @category    PHPExif
 * @package     Common
 */
class Exif implements ExifInterface
{
    /**
     * @var Aperture
     */
    protected $aperture;

    /**
     * @var Author
     */
    protected $author;

    /**
     * @var Coordinates
     */
    protected $coordinates;

    /**
     * @var DateTimeImmutable
     */
    protected $creationDate;

    /**
     * @var Dimensions
     */
    protected $dimensions;

    /**
     * @var ExposureTime
     */
    protected $exposureTime;

    /**
     * @var Filename
     */
    protected $filename;

    /**
     * @var Filesize
     */
    protected $filesize;

    /**
     * @var FocalLength
     */
    protected $focalLength;

    /**
     * @var FocusDistance
     */
    protected $focusDistance;

    /**
     * @var IsoSpeed
     */
    protected $isoSpeed;

    /**
     * @var Make
     */
    protected $make;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var MimeType
     */
    protected $mimeType;

    /**
     * @var Resolution
     */
    protected $resolution;

    /**
     * @var Software
     */
    protected $software;

    /**
     * {@inheritDoc}
     */
    public function getAperture()
    {
        return $this->aperture;
    }

    /**
     * {@inheritDoc}
     */
    public function withAperture(Aperture $aperture)
    {
        $new = clone $this;
        $new->aperture = $aperture;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * {@inheritDoc}
     */
    public function withMimeType(MimeType $mimeType)
    {
        $new = clone $this;
        $new->mimeType = $mimeType;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * {@inheritDoc}
     */
    public function withFilename(Filename $filename)
    {
        $new = clone $this;
        $new->filename = $filename;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilesize()
    {
        return $this->filesize;
    }

    /**
     * {@inheritDoc}
     */
    public function withFilesize(Filesize $filesize)
    {
        $new = clone $this;
        $new->filesize = $filesize;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * {@inheritDoc}
     */
    public function withMake(Make $make)
    {
        $new = clone $this;
        $new->make = $make;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * {@inheritDoc}
     */
    public function withModel(Model $model)
    {
        $new = clone $this;
        $new->model = $model;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * {@inheritDoc}
     */
    public function withSoftware(Software $software)
    {
        $new = clone $this;
        $new->software = $software;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * {@inheritDoc}
     */
    public function withAuthor(Author $author)
    {
        $new = clone $this;
        $new->author = $author;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * {@inheritDoc}
     */
    public function withDimensions(Dimensions $dimensions)
    {
        $new = clone $this;
        $new->dimensions = $dimensions;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getFocalLength()
    {
        return $this->focalLength;
    }

    /**
     * {@inheritDoc}
     */
    public function withFocalLength(FocalLength $focalLength)
    {
        $new = clone $this;
        $new->focalLength = $focalLength;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getFocusDistance()
    {
        return $this->focusDistance;
    }

    /**
     * {@inheritDoc}
     */
    public function withFocusDistance(FocusDistance $focusDistance)
    {
        $new = clone $this;
        $new->focusDistance = $focusDistance;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getExposureTime()
    {
        return $this->exposureTime;
    }

    /**
     * {@inheritDoc}
     */
    public function withExposureTime(ExposureTime $exposureTime)
    {
        $new = clone $this;
        $new->exposureTime = $exposureTime;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getIsoSpeed()
    {
        return $this->isoSpeed;
    }

    /**
     * {@inheritDoc}
     */
    public function withIsoSpeed(IsoSpeed $isoSpeed)
    {
        $new = clone $this;
        $new->isoSpeed = $isoSpeed;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * {@inheritDoc}
     */
    public function withCreationDate(DateTimeImmutable $date)
    {
        $new = clone $this;
        $new->creationDate = $date;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * {@inheritDoc}
     */
    public function withResolution(Resolution $resolution)
    {
        $new = clone $this;
        $new->resolution = $resolution;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * {@inheritDoc}
     */
    public function withCoordinates(Coordinates $coordinates)
    {
        $new = clone $this;
        $new->coordinates = $coordinates;

        return $new;
    }
}
