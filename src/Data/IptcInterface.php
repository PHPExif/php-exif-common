<?php
/**
 * Defines interface for IPTC data
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data;

use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\Copyright;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\Headline;

/**
 * IptcInterface
 *
 * Public API for IPTC data
 *
 * @category    PHPExif
 * @package     Common
 */
interface IptcInterface
{
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
}
