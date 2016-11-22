<?php
/**
 * Defines interface for EXIF data
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
 * ExifInterface
 *
 * Public API for EXIF data
 *
 * @category    PHPExif
 * @package     Common
 */
interface ExifInterface
{
    const COLORSPACE            = 'ColorSpace';
    const ORIENTATION           = 'Orientation';
    const GPS                   = 'gps';

    /**
     * Accessor for the aperture
     *
     * @return Aperture
     */
    public function getAperture();

    /**
     * Returns new instance with updated aperture
     *
     * @param Aperture $aperture
     *
     * @return ExifInterface
     */
    public function withAperture(Aperture $aperture);

    /**
     * Accessor for the mimeType
     *
     * @return MimeType
     */
    public function getMimeType();

    /**
     * Returns new instance with updated mimeType
     *
     * @param MimeType $mimeType
     *
     * @return ExifInterface
     */
    public function withMimeType(MimeType $mimeType);

    /**
     * Accessor for the filename
     *
     * @return Filename
     */
    public function getFilename();

    /**
     * Returns new instance with updated filename
     *
     * @param Filename $filename
     *
     * @return ExifInterface
     */
    public function withFilename(Filename $filename);

    /**
     * Accessor for the filesize
     *
     * @return Filesize
     */
    public function getFilesize();

    /**
     * Returns new instance with updated filesize
     *
     * @param Filesize $filesize
     *
     * @return ExifInterface
     */
    public function withFilesize(Filesize $filesize);

    /**
     * Accessor for the make
     *
     * @return Make
     */
    public function getMake();

    /**
     * Returns new instance with updated make
     *
     * @param Make $make
     *
     * @return ExifInterface
     */
    public function withMake(Make $make);

    /**
     * Accessor for the model
     *
     * @return Model
     */
    public function getModel();

    /**
     * Returns new instance with updated model
     *
     * @param Model $model
     *
     * @return ExifInterface
     */
    public function withModel(Model $model);

    /**
     * Accessor for the author
     *
     * @return Author
     */
    public function getAuthor();

    /**
     * Returns new instance with updated author
     *
     * @param Author $author
     *
     * @return ExifInterface
     */
    public function withAuthor(Author $author);

    /**
     * Accessor for the dimensions
     *
     * @return Dimensions
     */
    public function getDimensions();

    /**
     * Returns new instance with updated dimensions
     *
     * @param Dimensions $dimensions
     *
     * @return ExifInterface
     */
    public function withDimensions(Dimensions $dimensions);

    /**
     * Accessor for the focalLength
     *
     * @return FocalLength
     */
    public function getFocalLength();

    /**
     * Returns new instance with updated focalLength
     *
     * @param FocalLength $focalLength
     *
     * @return ExifInterface
     */
    public function withFocalLength(FocalLength $focalLength);

    /**
     * Accessor for the focusDistance
     *
     * @return FocusDistance
     */
    public function getFocusDistance();

    /**
     * Returns new instance with updated focusDistance
     *
     * @param FocusDistance $focusDistance
     *
     * @return ExifInterface
     */
    public function withFocusDistance(FocusDistance $focusDistance);

    /**
     * Accessor for the exposureTime
     *
     * @return ExposureTime
     */
    public function getExposureTime();

    /**
     * Returns new instance with updated exposureTime
     *
     * @param ExposureTime $exposureTime
     *
     * @return ExifInterface
     */
    public function withExposureTime(ExposureTime $exposureTime);

    /**
     * Accessor for the isoSpeed
     *
     * @return IsoSpeed
     */
    public function getIsoSpeed();

    /**
     * Returns new instance with updated isoSpeed
     *
     * @param IsoSpeed $isoSpeed
     *
     * @return ExifInterface
     */
    public function withIsoSpeed(IsoSpeed $isoSpeed);

    /**
     * Accessor for the creation date
     *
     * @return DateTimeImmutable
     */
    public function getCreationDate();

    /**
     * Returns new instance with updated creation date
     *
     * @param DateTimeImmutable $date
     *
     * @return ExifInterface
     */
    public function withCreationDate(DateTimeImmutable $date);

    /**
     * Accessor for the resolution
     *
     * @return Resolution
     */
    public function getResolution();

    /**
     * Returns new instance with updated resolution
     *
     * @param Resolution $resolution
     *
     * @return ExifInterface
     */
    public function withResolution(Resolution $resolution);
}
