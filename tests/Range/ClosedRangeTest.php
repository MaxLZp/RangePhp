<?php
/**
 * @author   MaxLZp <lmax_job@mail.ru>
 */

namespace maxlzp\range\tests\Range;

use maxlzp\range\Range\Range;
use PHPUnit\Framework\TestCase;

class ClosedRangeTest extends TestCase
{
    /**
     * @test
     */
    public function shouldIncludeLeftMarginValue()
    {
        $left = 0;
        $right = 10;

        $range = Range::between($left, $right);

        $this->assertTrue($range->includesValue($left));
    }

    /**
     * @test
     */
    public function shouldIncludeRightMarginValue()
    {
        $left = 0;
        $right = 10;

        $range = Range::between($left, $right);

        $this->assertTrue($range->includesValue($right));
    }

    /**
     * @test
     */
    public function shouldIncludeValue()
    {
        $left = 0;
        $right = 10;
        $between = 5;

        $range = Range::between($left, $right);

        $this->assertTrue($range->includesValue($between));
    }

    /**
     * @test
     */
    public function shouldNotIncludeValue()
    {
        $left = 0;
        $right = 10;

        $range = Range::between($left, $right);

        $this->assertFalse($range->includesValue($left - 1));
        $this->assertFalse($range->includesValue($right + 1));
    }

    /**
     * @test
     */
    public function shouldIncludeRange()
    {
        $range = Range::between(0, 10);
        $included = Range::between(2, 5);

        $this->assertTrue($range->includes($included));
    }

    /**
     * @test
     */
    public function shouldNotIncludeRange()
    {
        $range = Range::between(0, 10);
        $notincluded1 = Range::between(-1, 5);
        $notincluded2 = Range::between(5, 11);

        $this->assertFalse($range->includes($notincluded1));
        $this->assertFalse($range->includes($notincluded2));
    }

}
