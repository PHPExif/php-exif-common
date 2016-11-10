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

/**
 * Metadata class
 *
 * Container for Metadata of an image
 *
 * @category    PHPExif
 * @package     Common
 */
class Metadata implements MetadataInterface
{
    /**
     * @var ExifInterface
     */
    protected $exif;

    /**
     * @var IptcInterface
     */
    protected $iptc;

    /**
     * @var array
     */
    protected $rawData = [];

    /**
     * Constructor
     *
     * @param ExifInterface $exif
     * @param IptcInterface $iptc
     */
    public function __construct(ExifInterface $exif, IptcInterface $iptc)
    {
        $this->exif = $exif;
        $this->iptc = $iptc;
    }

    /**
     * {@inheritDoc}
     */
    public function setRawData(array $data)
    {
        $this->rawData = $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * {@inheritDoc}
     */
    public function withExif(ExifInterface $exif)
    {
        $new = clone $this;
        $new->exif = $exif;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function withIptc(IptcInterface $iptc)
    {
        $new = clone $this;
        $new->iptc = $iptc;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getExif()
    {
        return $this->exif;
    }

    /**
     * {@inheritDoc}
     */
    public function getIptc()
    {
        return $this->iptc;
    }
}
