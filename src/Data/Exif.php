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
use PHPExif\Common\Data\ValueObject\Exif\Author;
use PHPExif\Common\Data\ValueObject\Exif\Caption;
use PHPExif\Common\Data\ValueObject\Exif\Copyright;
use PHPExif\Common\Data\ValueObject\Exif\Credit;
use PHPExif\Common\Data\ValueObject\Exif\Filename;
use PHPExif\Common\Data\ValueObject\Exif\Filesize;
use PHPExif\Common\Data\ValueObject\Exif\FocalLength;
use PHPExif\Common\Data\ValueObject\Exif\FocusDistance;
use PHPExif\Common\Data\ValueObject\Exif\Headline;
use PHPExif\Common\Data\ValueObject\Exif\Height;
use PHPExif\Common\Data\ValueObject\Exif\HorizontalResolution;
use PHPExif\Common\Data\ValueObject\Exif\Make;
use PHPExif\Common\Data\ValueObject\Exif\MimeType;
use PHPExif\Common\Data\ValueObject\Exif\Model;
use PHPExif\Common\Data\ValueObject\Exif\Software;
use PHPExif\Common\Data\ValueObject\Exif\VerticalResolution;
use PHPExif\Common\Data\ValueObject\Exif\Width;

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
     * @var Caption
     */
    protected $caption;

    /**
     * @var Copyright
     */
    protected $copyright;

    /**
     * @var Credit
     */
    protected $credit;

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
     * @var Headline
     */
    protected $headline;

    /**
     * @var Height
     */
    protected $height;

    /**
     * @var HorizontalResolution
     */
    protected $horizontalResolution;

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
     * @var Software
     */
    protected $software;

    /**
     * @var VerticalResolution
     */
    protected $verticalResolution;

    /**
     * @var Width
     */
    protected $width;

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
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * {@inheritDoc}
     */
    public function withHeadline(Headline $headline)
    {
        $new = clone $this;
        $new->headline = $headline;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * {@inheritDoc}
     */
    public function withCredit(Credit $credit)
    {
        $new = clone $this;
        $new->credit = $credit;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * {@inheritDoc}
     */
    public function withCopyright(Copyright $copyright)
    {
        $new = clone $this;
        $new->copyright = $copyright;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * {@inheritDoc}
     */
    public function withCaption(Caption $caption)
    {
        $new = clone $this;
        $new->caption = $caption;

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
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * {@inheritDoc}
     */
    public function withWidth(Width $width)
    {
        $new = clone $this;
        $new->width = $width;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * {@inheritDoc}
     */
    public function withHeight(Height $height)
    {
        $new = clone $this;
        $new->height = $height;

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
    public function getHorizontalResolution()
    {
        return $this->horizontalResolution;
    }

    /**
     * {@inheritDoc}
     */
    public function withHorizontalResolution(HorizontalResolution $horizontalResolution)
    {
        $new = clone $this;
        $new->horizontalResolution = $horizontalResolution;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getVerticalResolution()
    {
        return $this->verticalResolution;
    }

    /**
     * {@inheritDoc}
     */
    public function withVerticalResolution(VerticalResolution $verticalResolution)
    {
        $new = clone $this;
        $new->verticalResolution = $verticalResolution;

        return $new;
    }
}
