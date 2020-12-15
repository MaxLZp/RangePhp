<?php
/**
 * @author   MaxLZp <lmax_job@mail.ru>
 */

namespace maxlzp\range\tests\Range;

use maxlzp\range\Range\Range;
use maxlzp\range\Range\RangeInterface;
use PHPUnit\Framework\TestCase;

class OpenRangeTest extends TestCase
{
    /**
     * @test
     */
    public function shouldConvertToExpectedString()
    {
        $expectedString = "(0, 10)";
        $range = Range::betweenOpen(0, 10);
        $this->assertEquals($expectedString, $range->__toString());
    }
    /**
     * @test
     */
    public function shouldNotIncludeLeftMarginValue()
    {
        $left = 0;
        $right = 10;

        $range = Range::betweenOpen($left, $right);

        $this->assertFalse($range->includesValue($left));
    }

    /**
     * @test
     */
    public function shouldNotIncludeRightMarginValue()
    {
        $left = 0;
        $right = 10;

        $range = Range::betweenOpen($left, $right);

        $this->assertFalse($range->includesValue($right));
    }

    /**
     * @test
     */
    public function shouldIncludeValue()
    {
        $left = 0;
        $right = 10;
        $between = 5;

        $range = Range::betweenOpen($left, $right);

        $this->assertTrue($range->includesValue($between));
    }

    /**
     * @test
     */
    public function shouldNotIncludeValue()
    {
        $left = 0;
        $right = 10;

        $range = Range::betweenOpen($left, $right);

        $this->assertFalse($range->includesValue($left - 1));
        $this->assertFalse($range->includesValue($right + 1));
    }

    /**
     * @test
     */
    public function shouldIncludeRange()
    {
        $range = Range::betweenOpen(0, 10);
        $included = Range::betweenOpen(2, 5);

        $this->assertTrue($range->includes($included));
    }

    /**
     * @test
     */
    public function shouldNotIncludeRange()
    {
        $range = Range::betweenOpen(0, 10);
        $notincluded1 = Range::betweenOpen(-1, 5);
        $notincluded2 = Range::betweenOpen(5, 11);
        $notincluded3 = Range::betweenOpen(0, 10);

        $this->assertFalse($range->includes($notincluded1));
        $this->assertFalse($range->includes($notincluded2));
        $this->assertFalse($range->includes($notincluded3));
    }

}
