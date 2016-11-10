<?php
/**
 * Reader: Read EXIF data from a file
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data;

/**
 * MetadataInterface
 *
 * Public API for accessing the metadata of a file
 *
 * @category    PHPExif
 * @package     Common
 */
interface MetadataInterface
{
    /**
     * Returns the raw data
     *
     * @return array
     */
    public function getRawData();

    /**
     * Sets the raw data
     *
     * @param array $data
     */
    public function setRawData(array $data);

    /**
     * Returns new instance with given EXIF data
     *
     * @param ExifInterface $exif
     *
     * @return MetadataInterface
     */
    public function withExif(ExifInterface $exif);

    /**
     * Returns new instance with given IPTC data
     *
     * @param IptcInterface $iptc
     *
     * @return MetadataInterface
     */
    public function withIptc(IptcInterface $iptc);

    /**
     * Returns the available EXIF data
     *
     * @return ExifInterface
     */
    public function getExif();

    /**
     * Returns the available IPTC data
     *
     * @return IptcInterface
     */
    public function getIptc();
}
