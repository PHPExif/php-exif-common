<?php
/**
 * Iptc: A container class for IPTC data
 *
 * @link        http://github.com/PHPExif/php-exif-common for the canonical source repository
 * @copyright   Copyright (c) 2016 Tom Van Herreweghe <tom@theanalogguy.be>
 * @license     http://github.com/PHPExif/php-exif-common/blob/master/LICENSE MIT License
 * @category    PHPExif
 * @package     Common
 */

namespace PHPExif\Common\Data;

/**
 * Iptc class
 *
 * Container for IPTC data
 *
 * @category    PHPExif
 * @package     Common
 */
final class Iptc implements IptcInterface
{
    /**
     * Contains the mapping of names to IPTC field numbers
     *
     * @var array
     */
    public static $iptcMapping = array(
        'caption'   => '2#120',
        'copyright' => '2#116',
        'credit'    => '2#110',
        'headline'  => '2#105',
        'jobtitle'  => '2#085',
        'keywords'  => '2#025',
        'source'    => '2#115',
        'title'     => '2#005',
    );
}
