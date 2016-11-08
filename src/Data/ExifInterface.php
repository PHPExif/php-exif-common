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

use PHPExif\Common\Data\ValueObject\Exif\Aperture;
use PHPExif\Common\Data\ValueObject\Exif\Author;
use PHPExif\Common\Data\ValueObject\Exif\Caption;
use PHPExif\Common\Data\ValueObject\Exif\Copyright;
use PHPExif\Common\Data\ValueObject\Exif\Credit;
use PHPExif\Common\Data\ValueObject\Exif\Filename;
use PHPExif\Common\Data\ValueObject\Exif\Filesize;
use PHPExif\Common\Data\ValueObject\Exif\Headline;
use PHPExif\Common\Data\ValueObject\Exif\Make;
use PHPExif\Common\Data\ValueObject\Exif\MimeType;
use PHPExif\Common\Data\ValueObject\Exif\Model;
use PHPExif\Common\Data\ValueObject\Exif\Software;

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
    const CAMERA                = 'camera';
    const COLORSPACE            = 'ColorSpace';
    const CREATION_DATE         = 'creationdate';
    const FOCAL_LENGTH          = 'focalLength';
    const FOCAL_DISTANCE        = 'focalDistance';
    const HEIGHT                = 'height';
    const HORIZONTAL_RESOLUTION = 'horizontalResolution';
    const JOB_TITLE             = 'jobTitle';
    const KEYWORDS              = 'keywords';
    const ORIENTATION           = 'Orientation';
    const SOURCE                = 'source';
    const TITLE                 = 'title';
    const VERTICAL_RESOLUTION   = 'verticalResolution';
    const WIDTH                 = 'width';
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
}
