<?php

namespace maxlzp\range\tests\Range\Collection;

use maxlzp\range\Range\Range;
use maxlzp\range\tests\_Mocks\Range\Collection\RangeComparerMock;
use PHPUnit\Framework\TestCase;

class RangeComparerMockTest extends TestCase
{

    /**
     * @test
     */
    public function shouldCompareRanges()
    {
        $first = Range::between(5, 10);
        $second = Range::between(0, 5);

        $comparer = new RangeComparerMock();

        $result = $comparer($first, $second);
        $this->assertLessThan(0, $result);
    }
}
