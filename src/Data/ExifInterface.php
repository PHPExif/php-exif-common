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
use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\Copyright;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\ExposureTime;
use PHPExif\Common\Data\ValueObject\Filename;
use PHPExif\Common\Data\ValueObject\Filesize;
use PHPExif\Common\Data\ValueObject\FocalLength;
use PHPExif\Common\Data\ValueObject\FocusDistance;
use PHPExif\Common\Data\ValueObject\Headline;
use PHPExif\Common\Data\ValueObject\Height;
use PHPExif\Common\Data\ValueObject\HorizontalResolution;
use PHPExif\Common\Data\ValueObject\IsoSpeed;
use PHPExif\Common\Data\ValueObject\Make;
use PHPExif\Common\Data\ValueObject\MimeType;
use PHPExif\Common\Data\ValueObject\Model;
use PHPExif\Common\Data\ValueObject\Software;
use PHPExif\Common\Data\ValueObject\VerticalResolution;
use PHPExif\Common\Data\ValueObject\Width;

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
    const CREATION_DATE         = 'creationdate';
    const KEYWORDS              = 'keywords';
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
     * Accessor for the headline
     *
     * @return Headline
     */
    public function getHeadline();

    /**
     * Returns new instance with updated headline
     *
     * @param Headline $headline
     *
     * @return ExifInterface
     */
    public function withHeadline(Headline $headline);

    /**
     * Accessor for the credit
     *
     * @return Credit
     */
    public function getCredit();

    /**
     * Returns new instance with updated credit
     *
     * @param Credit $credit
     *
     * @return ExifInterface
     */
    public function withCredit(Credit $credit);

    /**
     * Accessor for the copyright
     *
     * @return Copyright
     */
    public function getCopyright();

    /**
     * Returns new instance with updated copyright
     *
     * @param Copyright $copyright
     *
     * @return ExifInterface
     */
    public function withCopyright(Copyright $copyright);

    /**
     * Accessor for the caption
     *
     * @return Caption
     */
    public function getCaption();

    /**
     * Returns new instance with updated caption
     *
     * @param Caption $caption
     *
     * @return ExifInterface
     */
    public function withCaption(Caption $caption);

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
     * Accessor for the width
     *
     * @return Width
     */
    public function getWidth();

    /**
     * Returns new instance with updated width
     *
     * @param Width $width
     *
     * @return ExifInterface
     */
    public function withWidth(Width $width);

    /**
     * Accessor for the height
     *
     * @return Height
     */
    public function getHeight();

    /**
     * Returns new instance with updated height
     *
     * @param Height $height
     *
     * @return ExifInterface
     */
    public function withHeight(Height $height);

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
     * Accessor for the horizontalResolution
     *
     * @return HorizontalResolution
     */
    public function getHorizontalResolution();

    /**
     * Returns new instance with updated horizontalResolution
     *
     * @param HorizontalResolution $horizontalResolution
     *
     * @return ExifInterface
     */
    public function withHorizontalResolution(HorizontalResolution $horizontalResolution);

    /**
     * Accessor for the verticalResolution
     *
     * @return VerticalResolution
     */
    public function getVerticalResolution();

    /**
     * Returns new instance with updated verticalResolution
     *
     * @param VerticalResolution $verticalResolution
     *
     * @return ExifInterface
     */
    public function withVerticalResolution(VerticalResolution $verticalResolution);

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
}
