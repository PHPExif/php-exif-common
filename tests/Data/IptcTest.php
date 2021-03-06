<?php

namespace Tests\PHPExif\Common\Data;

use Mockery as m;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use PHPExif\Common\Data\Iptc;
use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\Copyright;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\Headline;
use PHPExif\Common\Data\ValueObject\Jobtitle;
use PHPExif\Common\Data\ValueObject\Keyword;
use PHPExif\Common\Data\ValueObject\Source;
use PHPExif\Common\Data\ValueObject\Title;

/**
 * Class: IptcTest
 *
 * @see \PHPUnit_Framework_TestCase
 * @abstract
 * @coversDefaultClass \PHPExif\Common\Data\Iptc
 * @covers ::<!public>
 */
class IptcTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::withHeadline
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithHeadlineReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withHeadline(new Headline('School \'s out for summer!'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getHeadline
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetHeadlineReturnsCorrectData()
    {
        $headline = new Headline('Smoking in the boys room');
        $old = new Iptc();
        $new = $old->withHeadline($headline);

        $this->assertSame(
            $headline,
            $new->getHeadline()
        );
    }

    /**
     * @covers ::withCredit
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithCreditReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withCredit(new Credit('Tom Van Herreweghe'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getCredit
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetCreditReturnsCorrectData()
    {
        $credit = new Credit('Tom Van Herreweghe');
        $old = new Iptc();
        $new = $old->withCredit($credit);

        $this->assertSame(
            $credit,
            $new->getCredit()
        );
    }

    /**
     * @covers ::withCopyright
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithCopyrightReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withCopyright(new Copyright('Tom Van Herreweghe'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getCopyright
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetCopyrightReturnsCorrectData()
    {
        $copyright = new Copyright('Tom Van Herreweghe');
        $old = new Iptc();
        $new = $old->withCopyright($copyright);

        $this->assertSame(
            $copyright,
            $new->getCopyright()
        );
    }

    /**
     * @covers ::withCaption
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithCaptionReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withCaption(new Caption('Lorum Ipsum'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getCaption
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetCaptionReturnsCorrectData()
    {
        $caption = new Caption('Lorum Ipsum');
        $old = new Iptc();
        $new = $old->withCaption($caption);

        $this->assertSame(
            $caption,
            $new->getCaption()
        );
    }

    /**
     * @covers ::withTitle
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithTitleReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withTitle(new Title('Morning Glory Pool'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getTitle
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetTitleReturnsCorrectData()
    {
        $title = new Title('Morning Glory Pool');
        $old = new Iptc();
        $new = $old->withTitle($title);

        $this->assertSame(
            $title,
            $new->getTitle()
        );
    }

    /**
     * @covers ::withKeywords
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithKeywordsReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $collection = new ArrayCollection;
        $collection->add(new Keyword('Foo'));
        $collection->add(new Keyword('Bar'));
        $collection->add(new Keyword('Baz'));
        $new = $old->withKeywords($collection);

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getKeywords
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetKeywordsReturnsCorrectData()
    {
        $collection = new ArrayCollection;
        $collection->add(new Keyword('Foo'));
        $collection->add(new Keyword('Bar'));
        $collection->add(new Keyword('Baz'));
        $old = new Iptc();
        $new = $old->withKeywords($collection);

        $this->assertSame(
            $collection,
            $new->getKeywords()
        );
    }

    /**
     * @covers ::withJobtitle
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithJobtitleReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withJobtitle(new Jobtitle('John & Olivia wedding'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getJobtitle
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetJobtitleReturnsCorrectData()
    {
        $jobtitle = new Jobtitle('Baby shoot North West');
        $old = new Iptc();
        $new = $old->withJobtitle($jobtitle);

        $this->assertSame(
            $jobtitle,
            $new->getJobtitle()
        );
    }

    /**
     * @covers ::withSource
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testWithSourceReturnsNewIptcInstance()
    {
        $old = new Iptc();
        $new = $old->withSource(new Source('No idea'));

        $this->assertInstanceOf(
            Iptc::class,
            $new
        );

        $this->assertNotSame($old, $new);
    }

    /**
     * @covers ::getSource
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testGetSourceReturnsCorrectData()
    {
        $source = new Source('A small camera');
        $old = new Iptc();
        $new = $old->withSource($source);

        $this->assertSame(
            $source,
            $new->getSource()
        );
    }

    /**
     * @covers ::jsonSerialize
     * @group data
     * @group exif
     *
     * @return void
     */
    public function testJsonSerializeReturnsArrayOfData()
    {
        $iptc = new Iptc();
        $data = $iptc->jsonSerialize();

        $this->assertInternalType(
            'array',
            $data
        );
        $this->assertTrue(
            count($data) > 0
        );

        $this->assertEquals(
            json_encode($data),
            json_encode($iptc)
        );
    }
}
