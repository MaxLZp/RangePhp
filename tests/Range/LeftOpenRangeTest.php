<?php
/**
 * @author   MaxLZp <lmax_job@mail.ru>
 */

namespace maxlzp\range\tests\Range;

use maxlzp\range\Range\Range;
use PHPUnit\Framework\TestCase;

class LeftOpenRangeTest extends TestCase
{

    /**
     * @test
     */
    public function shouldIncludeRightMarginValue()
    {
        $right = 10;

        $range = Range::lessOrEqualThan($right);

        $this->assertTrue($range->includesValue($right));
    }

    /**
     * @test
     */
    public function shouldIncludeValue()
    {
        $right = 10;

        $range = Range::lessOrEqualThan($right);

        $this->assertTrue($range->includesValue($right - 1));
    }

    /**
     * @test
     */
    public function shouldNotIncludeValue()
    {
        $right = 10;

        $range = Range::lessOrEqualThan($right);

        $this->assertFalse($range->includesValue($right + 1));
    }

    /**
     * @test
     */
    public function shouldIncludeRange()
    {
        $range = Range::lessOrEqualThan(10);
        $included = Range::lessOrEqualThan(5);
        $included2 = Range::between(2, 5);

        $this->assertTrue($range->includes($included));
        $this->assertTrue($range->includes($included2));
    }

    /**
     * @test
     */
    public function shouldNotIncludeRange()
    {
        $range = Range::lessOrEqualThan(10);
        $notincluded1 = Range::greaterThan(10);
        $notincluded2 = Range::lessOrEqualThan(11);

        $this->assertFalse($range->includes($notincluded1));
        $this->assertFalse($range->includes($notincluded2));
    }

}
