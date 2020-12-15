<?php
/**
 * @author   MaxLZp <lmax_job@mail.ru>
 */

namespace maxlzp\range\tests\Range;

use maxlzp\range\Range\Range;
use PHPUnit\Framework\TestCase;

class RightOpenRangeTest extends TestCase
{

    /**
     * @test
     */
    public function shouldConvertToExpectedString()
    {
        $expectedString = "[10, ∞)";
        $range = Range::greaterOrEqualThan(10);
        $this->assertEquals($expectedString, $range->__toString());
    }
    /**
     * @test
     */
    public function shouldIncludeLeftMarginValue()
    {
        $left = 0;

        $range = Range::greaterOrEqualThan($left);

        $this->assertTrue($range->includesValue($left));
    }

    /**
     * @test
     */
    public function shouldIncludeValue()
    {
        $left = 0;
        $between = 5;

        $range = Range::greaterOrEqualThan($left);

        $this->assertTrue($range->includesValue($between));
    }

    /**
     * @test
     */
    public function shouldNotIncludeValue()
    {
        $left = 0;

        $range = Range::greaterOrEqualThan($left);

        $this->assertFalse($range->includesValue($left - 1));
    }

    /**
     * @test
     */
    public function shouldIncludeRange()
    {
        $range = Range::greaterOrEqualThan(0);
        $included = Range::greaterOrEqualThan(2, 5);
        $included1 = Range::greaterOrEqualThan(0, 1);

        $this->assertTrue($range->includes($included));
        $this->assertTrue($range->includes($included1));
    }

    /**
     * @test
     */
    public function shouldNotIncludeRange()
    {
        $range = Range::greaterOrEqualThan(0);
        $notincluded1 = Range::greaterOrEqualThan(-1, 5);

        $this->assertFalse($range->includes($notincluded1));
    }

}
