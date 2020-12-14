<?php

namespace maxlzp\range\tests;

use maxlzp\range\Margin\NegativeInfinityMargin;
use maxlzp\range\Margin\PositiveInfinityMargin;
use maxlzp\range\Range\Range;
use maxlzp\range\Range\ClosedRange;
use maxlzp\range\Range\LeftOpenRange;
use maxlzp\range\Range\OpenRange;
use maxlzp\range\Range\RightOpenRange;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateClosedRange()
    {
        $left = 0;
        $right = 10;
        $range = Range::between($left, $right);

        $this->assertInstanceOf(ClosedRange::class, $range);
        $this->assertEquals($left, $range->getLeft()->getValue());
        $this->assertEquals($right, $range->getRight()->getValue());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateOpenRange()
    {
        $left = 0;
        $right = 10;
        $range = Range::betweenOpen($left, $right);

        $this->assertInstanceOf(OpenRange::class, $range);
        $this->assertEquals($left, $range->getLeft()->getValue());
        $this->assertEquals($right, $range->getRight()->getValue());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateLeftOpenRange()
    {
        $left = 0;
        $right = 10;
        $range = Range::betweenLeftOpen($left, $right);

        $this->assertInstanceOf(LeftOpenRange::class, $range);
        $this->assertEquals($left, $range->getLeft()->getValue());
        $this->assertEquals($right, $range->getRight()->getValue());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateRightOpenRange()
    {
        $left = 0;
        $right = 10;
        $range = Range::betweenRightOpen($left, $right);

        $this->assertInstanceOf(RightOpenRange::class, $range);
        $this->assertEquals($left, $range->getLeft()->getValue());
        $this->assertEquals($right, $range->getRight()->getValue());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateOpenRangeWithPositiveInfinityMargin()
    {
        $left = 0;
        $range = Range::greaterThan($left);

        $this->assertInstanceOf(OpenRange::class, $range);
        $this->assertEquals($left, $range->getLeft()->getValue());
        $this->assertInstanceOf(PositiveInfinityMargin::class, $range->getRight());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateRightOpenRangeWithPositiveInfinityMargin()
    {
        $left = 0;
        $range = Range::greaterOrEqualThan($left);

        $this->assertInstanceOf(RightOpenRange::class, $range);
        $this->assertEquals($left, $range->getLeft()->getValue());
        $this->assertInstanceOf(PositiveInfinityMargin::class, $range->getRight());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateOpenRangeWithNegativeInfinityMargin()
    {
        $right = 100;
        $range = Range::lessThan($right);

        $this->assertInstanceOf(OpenRange::class, $range);
        $this->assertEquals($right, $range->getRight()->getValue());
        $this->assertInstanceOf(NegativeInfinityMargin::class, $range->getLeft());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function shouldCreateLeftOpenRangeWithNegativeInfinityMargin()
    {
        $right = 100;
        $range = Range::lessOrEqualThan($right);

        $this->assertInstanceOf(LeftOpenRange::class, $range);
        $this->assertEquals($right, $range->getRight()->getValue());
        $this->assertInstanceOf(NegativeInfinityMargin::class, $range->getLeft());
    }

}
