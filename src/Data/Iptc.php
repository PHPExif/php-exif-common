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

use Doctrine\Common\Collections\Collection;
use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\Copyright;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\Headline;
use PHPExif\Common\Data\ValueObject\Jobtitle;
use PHPExif\Common\Data\ValueObject\Source;
use PHPExif\Common\Data\ValueObject\Title;
use \JsonSerializable;
use \ReflectionObject;
use \ReflectionProperty;

/**
 * Iptc class
 *
 * Container for IPTC data
 *
 * @category    PHPExif
 * @package     Common
 */
class Iptc implements IptcInterface, JsonSerializable
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
     * @var Jobtitle
     */
    protected $jobtitle;

    /**
     * @var Source
     */
    protected $source;

    /**
     * @var Title
     */
    protected $title;

    /**
     * @var Collection
     */
    protected $keywords;

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

    /**
     * {@inheritDoc}
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * {@inheritDoc}
     */
    public function withKeywords(Collection $keywords)
    {
        $new = clone $this;
        $new->keywords = $keywords;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }

    /**
     * {@inheritDoc}
     */
    public function withJobtitle(Jobtitle $jobtitle)
    {
        $new = clone $this;
        $new->jobtitle = $jobtitle;

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * {@inheritDoc}
     */
    public function withSource(Source $source)
    {
        $new = clone $this;
        $new->source = $source;

        return $new;
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $reflObject = new ReflectionObject($this);
        $properties = $reflObject->getProperties(ReflectionProperty::IS_PROTECTED);

        $data = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();

            $data[$propertyName] = $this->{$propertyName};
        }

        return $data;
    }
}
