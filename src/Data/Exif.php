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

use PHPExif\Common\Data\ValueObject\Exif\Aperture;
use PHPExif\Common\Data\ValueObject\Exif\Filename;
use PHPExif\Common\Data\ValueObject\Exif\Filesize;
use PHPExif\Common\Data\ValueObject\Exif\MimeType;

/**
 * Exif class
 *
 * Container for EXIF data
 *
 * @category    PHPExif
 * @package     Common
 */
final class Exif implements ExifInterface
{
    /**
     * @var Aperture
     */
    private $aperture;

    /**
     * @var Filename
     */
    private $filename;

    /**
     * @var Filesize
     */
    private $filesize;

    /**
     * @var MimeType
     */
    private $mimeType;

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
}
