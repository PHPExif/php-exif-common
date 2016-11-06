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
use PHPExif\Common\Data\ValueObject\Exif\Filename;
use PHPExif\Common\Data\ValueObject\Exif\Filesize;
use PHPExif\Common\Data\ValueObject\Exif\MimeType;

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
    const APERTURE              = 'aperture';
    const AUTHOR                = 'author';
    const CAMERA                = 'camera';
    const CAPTION               = 'caption';
    const COLORSPACE            = 'ColorSpace';
    const COPYRIGHT             = 'copyright';
    const CREATION_DATE         = 'creationdate';
    const CREDIT                = 'credit';
    const EXPOSURE              = 'exposure';
    const FILESIZE              = 'FileSize';
    const FOCAL_LENGTH          = 'focalLength';
    const FOCAL_DISTANCE        = 'focalDistance';
    const HEADLINE              = 'headline';
    const HEIGHT                = 'height';
    const HORIZONTAL_RESOLUTION = 'horizontalResolution';
    const ISO                   = 'iso';
    const JOB_TITLE             = 'jobTitle';
    const KEYWORDS              = 'keywords';
    const MIMETYPE              = 'MimeType';
    const ORIENTATION           = 'Orientation';
    const SOFTWARE              = 'software';
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
}
