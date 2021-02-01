<?php

namespace maxlzp\range\tests\Range\Collection;

use maxlzp\range\Range\Collection\LeftAscRangeComparer;
use maxlzp\range\Range\Range;
use PHPUnit\Framework\TestCase;

class LeftAscRangeComparerTest extends TestCase
{

    /**
     * @test
     */
    public function shouldReturnNegativeValueWhenFirstIsLessThanSecond()
    {
        $first = Range::between(4, 5);
        $second = Range::between(10, 11);

        $comparer = new LeftAscRangeComparer();

        $result = $comparer($first, $second);
        $this->assertLessThan(0, $result);
    }

    /**
     * @test
     */
    public function shouldReturnPositiveValueWhenFirstIsGreaterThanSecond()
    {
        $first = Range::between(10, 11);
        $second = Range::between(4, 5);

        $comparer = new LeftAscRangeComparer();

        $result = $comparer($first, $second);
        $this->assertGreaterThan(0, $result);
    }

    /**
     * @test
     */
    public function shouldReturnZeroWhenFirstIsEqualThanSecond()
    {
        $first = Range::between(10, 11);
        $second = Range::between(10, 12);

        $comparer = new LeftAscRangeComparer();

        $result = $comparer($first, $second);
        $this->assertEquals(0, $result);
    }
}
