<?php

namespace maxlzp\range\tests\Range;

use maxlzp\range\Margin\Margin;
use maxlzp\range\Range\Exception\InvalidMarginsOrderException;
use maxlzp\range\Range\Exception\NoGapException;
use maxlzp\range\Range\Exception\SplitValueIsOutOfRangeException;
use maxlzp\range\Range\Range;
use maxlzp\range\Range\RangeImpl;
use maxlzp\range\tests\_Mocks\Range\RangeImplMock;
use PHPUnit\Framework\TestCase;

class RangeImplTest extends TestCase
{
    /**
     * @test
     */
    public function shouldConvertToExpectedString()
    {
        $expectedString = "[0, 10]";
        $range = new RangeImplMock(new Margin(0), new Margin(10));
        $this->assertEquals($expectedString, $range->__toString());
    }

    /**
     * @test
     */
    public function shouldTrowExceptionWhenCreateingRangeWithInvalidMarginsOrder()
    {
        $this->expectException(InvalidMarginsOrderException::class);
        $range = Range::between(100, 10);
    }

    /**
     * @test
     */
    public function shouldTouchWithLeftMargin()
    {
        $range = Range::between(0, 10);
        $range2 = Range::between(-10, 0);

        $this->assertTrue($range->touches($range2));
    }

    /**
     * @test
     */
    public function shouldTouchWithRightMargin()
    {
        $range = Range::between(0, 10);
        $range2 = Range::between(10, 11);

        $this->assertTrue($range->touches($range2));
    }

    /**
     * @test
     */
    public function shouldCreateEmptyGap()
    {
        $rng1 = Range::lessThan(0);
        $rng2 = Range::greaterThan(0);

        $gap = $rng1->gap($rng2);

        $this->assertTrue($gap->isEmpty());
    }

    /**
     * @test
     */
    public function shouldCreateGaps()
    {
        $rng1 = Range::between(0, 1);
        $rng2 = Range::between(2, 3);
        $rng3 = Range::between(4, 5);

        $gap = $rng1->gap($rng2);
        $gap2 = $rng3->gap($rng2);

        $this->assertEquals($rng1->getRight(), $gap->getLeft());
        $this->assertEquals($rng2->getLeft(), $gap->getRight());

        $this->assertEquals($rng2->getRight(), $gap2->getLeft());
        $this->assertEquals($rng3->getLeft(), $gap2->getRight());
    }

    /**
     * @test
     */
    public function shouldThrowExcpetionWhenCreatingGapForOverlappingRanges()
    {
        $this->expectException(NoGapException::class);

        $rng1 = Range::lessThan(10);
        $rng2 = Range::greaterThan(0);

        try {
            $gap = $rng1->gap($rng2);
        } catch(NoGapException $e) {
            $message = $e->getMessage();
            throw $e;
        }
    }

    /**
     * @test
     */
    public function shouldSplitRange()
    {
        $leftValue = 0;
        $rightValue = 10;
        $splitValue = 5;
        $expectedSplittedCount = 2;

        $range = Range::between($leftValue, $rightValue);
        $splitted = $range->splitAt($splitValue);

        $this->assertEquals($expectedSplittedCount, \count($splitted));
        $this->assertInstanceOf(get_class($range), $splitted[0]);
        $this->assertInstanceOf(get_class($range), $splitted[1]);

        $this->assertTrue($splitted[0]->getLeft()->isEqualTo($range->getLeft()));
        $this->assertTrue($splitted[0]->getRight()->isEqualToValue($splitValue));

        $this->assertTrue($splitted[1]->getLeft()->isEqualToValue($splitValue));
        $this->assertTrue($splitted[1]->getRight()->isEqualTo($range->getRight()));
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenSplitValueIsOutOfRange()
    {
        $this->expectException(SplitValueIsOutOfRangeException::class);
        $leftValue = 0;
        $rightValue = 10;
        $splitValue = 15;

        $range = Range::between($leftValue, $rightValue);
        $splitted = $range->splitAt($splitValue);
    }
}
