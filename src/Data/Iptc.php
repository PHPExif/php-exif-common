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

use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\Copyright;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\Headline;
use PHPExif\Common\Data\ValueObject\Title;

/**
 * Iptc class
 *
 * Container for IPTC data
 *
 * @category    PHPExif
 * @package     Common
 */
class Iptc implements IptcInterface
{
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
     * @var Headline
     */
    protected $headline;

    /**
     * @var Title
     */
    protected $title;

    /**
     * Contains the mapping of names to IPTC field numbers
     *
     * @var array
     */
    public static $iptcMapping = array(
        'jobtitle'  => '2#085',
        'keywords'  => '2#025',
        'source'    => '2#115',
        'title'     => '2#005',
    );

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritDoc}
     */
    public function withTitle(Title $title)
    {
        $new = clone $this;
        $new->title = $title;

        return $new;
    }
}
