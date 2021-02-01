<?php

namespace maxlzp\range\tests\Range\Collection;

use maxlzp\range\Range\Collection\LeftDescRangeComparer;
use maxlzp\range\Range\Range;
use PHPUnit\Framework\TestCase;

class LeftDescRangeComparerTest extends TestCase
{

    /**
     * @test
     */
    public function shouldReturnPositiveValueWhenFirstIsLessThanSecond()
    {
        $first = Range::between(4, 5);
        $second = Range::between(10, 11);

        $comparer = new LeftDescRangeComparer();

        $result = $comparer($first, $second);
        $this->assertGreaterThan(0, $result);
    }

    /**
     * @test
     */
    public function shouldReturnNegativeValueWhenFirstIsGreaterThanSecond()
    {
        $first = Range::between(10, 11);
        $second = Range::between(4, 5);

        $comparer = new LeftDescRangeComparer();

        $result = $comparer($first, $second);
        $this->assertLessThan(0, $result);
    }

    /**
     * @test
     */
    public function shouldReturnZeroWhenFirstIsEqualThanSecond()
    {
        $first = Range::between(10, 11);
        $second = Range::between(10, 12);

        $comparer = new LeftDescRangeComparer();

        $result = $comparer($first, $second);
        $this->assertEquals(0, $result);
    }
}
