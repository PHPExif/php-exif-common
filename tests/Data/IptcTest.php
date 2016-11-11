<?php

namespace Tests\PHPExif\Common\Data;

use Mockery as m;
use PHPExif\Common\Data\Iptc;
use PHPExif\Common\Data\ValueObject\Caption;
use PHPExif\Common\Data\ValueObject\Copyright;
use PHPExif\Common\Data\ValueObject\Credit;
use PHPExif\Common\Data\ValueObject\Headline;

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
}
