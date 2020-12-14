<?php

namespace maxlzp\range\tests\Range;

use maxlzp\range\Range\Exception\NoGapException;
use maxlzp\range\Range\Range;
use maxlzp\range\Range\RangeImpl;
use PHPUnit\Framework\TestCase;

class RangeImplTest extends TestCase
{

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
        $rng2 = Range::between(1, 2);
        $rng3 = Range::between(2, 3);

        $gap = $rng1->gap($rng2);
        $gap2 = $rng2->gap($rng3);

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

//    /**
//     * @test
//     */
//    public function Range_Includes_Value_TrueForValueWithinLimitedRange()
//    {
//        $range = Range::between(10, 20);
//
//        $this->assertTrue($range->includesValue(15));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Value_FalseForValueOutsideOfLimitedRange()
//    {
//        $range = Range::between(10, 20);
//
//        $this->assertFalse($range->includesValue(25));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Value_TrueForValueOutsideOfUmimitedRange()
//    {
//        $range = Range::lessThan(100);
//
//        $this->assertTrue($range->includesValue(25));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Value_FalseForValueOutsideOfUmimitedRange()
//    {
//        $range = Range::lessThan(100);
//
//        $this->assertFalse($range->includesValue(125));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_TrueForRangeIncludedInUnlimitedRange()
//    {
//        $outer = new Range();
//        $inner = Range::between(-5, 5);
//
//        $this->assertTrue($outer->includesRange($inner));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_TrueForRangeLessThatNumberIncludedInUnlimitedRange()
//    {
//        $outer = new Range();
//        $inner = Range::lessThan(0);
//
//        $this->assertTrue($outer->includesRange($inner));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_TrueForRangeGreaterThanNumberIncludeInUnlimitedRange()
//    {
//        $outer = new Range();
//        $inner = Range::greaterThan(0);
//
//        $this->assertTrue($outer->includesRange($inner));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_TrueForRangeIncludeInLimitedRange()
//    {
//        $outer = Range::between(-100, 100);
//        $inner = Range::between(-5, 5);
//
//        $this->assertTrue($outer->includesRange($inner));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_FalseForUnlimitedRangeIncludeInLimitedRange()
//    {
//        $inner = Range::between(-100, 100);
//        $outer = new Range();
//
//        $this->assertFalse($inner->includesRange($outer));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_FalseForUnlimitedRangeIncludeInLessThanNumberLimitedRange()
//    {
//        $outer = Range::lessThan(0);
//        $inner = new Range();
//
//        $this->assertFalse($outer->includesRange($inner));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Includes_Range_FalseForUnlimitedRangeIncludeInGreaterThanNumberLimitedRange()
//    {
//        $outer = Range::greaterThan(0);
//        $inner = new Range();
//
//        $this->assertFalse($outer->includesRange($inner));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_IsEmptyWithSameMarginValues()
//    {
//        $value = 10;
//        $range = Range::between($value, $value);
//        $this->assertTrue($range->isEmpty());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_IsNotEmptyWithDifferentMarginValues()
//    {
//        $value = 10;
//        $range = Range::between($value, $value + 1);
//        $this->assertFalse($range->isEmpty());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_IsNotEmptyWithUndefinedMargins()
//    {
//        $range = new Range();
//        $this->assertFalse($range->isEmpty());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_IsContigous_TrueForContigousRanges()
//    {
//        $ranges = [
//            Range::between(0, 100),
//            Range::lessThan(0),
//            Range::greaterThan(100)
//        ];
//
//        $this->assertTrue(Range::isContigous($ranges));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_IsContigous_TrueForOverapplingRanges()
//    {
//        $ranges = [
//            Range::between(-5, 110),
//            Range::lessThan(0),
//            Range::greaterThan(100)
//        ];
//
//        $this->assertTrue(Range::isContigous($ranges));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_IsContigous_FalseForNonContigousRanges()
//    {
//        $ranges = [
//            Range::between(0, 100),
//            Range::lessThan(0),
//            Range::greaterThan(101)
//        ];
//
//        $this->assertFalse(Range::isContigous($ranges));
//    }
//
//    /**
//     * @test
//     * @expectedException maxlzp\range\Exceptions\NonContigousRangesCombinationAttemptException
//     */
//    public function Range_CombineArray_ForNonContigousThrowsException()
//    {
//        $ranges = [
//            Range::between(0, 100),
//            Range::lessThan(0),
//            Range::greaterThan(101)
//        ];
//        Range::combineArray($ranges);
//    }
//
//    /**
//     * @test
//     */
//    public function Range_CombineArray_SuccessForContigousUnlimitedRange()
//    {
//        $ranges = [
//            Range::between(0, 100),
//            Range::lessThan(0),
//            Range::greaterThan(100)
//        ];
//
//        $combined = Range::combineArray($ranges);
//
//        $this->assertInstanceOf(NegativeInfinityRangeMarginInterface::class, $combined->getLeft());
//        $this->assertInstanceOf(PositiveInfinityRangeMarginInterface::class, $combined->getRight());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_CombineArray_SuccessForContigousUnlimitedEndRange()
//    {
//        $expectedStart = 0;
//        $ranges = [
//            Range::between($expectedStart, 100),
//            Range::greaterThan(100)
//        ];
//
//        $combined = Range::combineArray($ranges);
//
//        $this->assertEquals($expectedStart, $combined->getLeft()->getValue());
//        $this->assertInstanceOf(PositiveInfinityRangeMarginInterface::class, $combined->getRight());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_CombineArray_SuccessForContigousUnlimitedStartRange()
//    {
//        $expectedEnd = 100;
//        $ranges = [
//            Range::between(0, $expectedEnd),
//            Range::lessThan(0),
//        ];
//
//        $combined = Range::combineArray($ranges);
//
//        $this->assertInstanceOf(NegativeInfinityRangeMarginInterface::class, $combined->getLeft());
//        $this->assertEquals($expectedEnd, $combined->getRight()->getValue());
//
//    }
//
//    /**
//     * @test
//     */
//    public function Range_CombineArray_SuccessForContigousLimitedStartRange()
//    {
//        $expectedStart = 0;
//        $expectedEnd = 100;
//        $ranges = [
//            Range::between(20, $expectedEnd),
//            Range::between(10, 20),
//            Range::between($expectedStart, 10),
//        ];
//        $combined = Range::combineArray($ranges);
//
//        $this->assertEquals($expectedStart, $combined->getLeft()->getValue());
//        $this->assertEquals($expectedEnd, $combined->getRight()->getValue());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_CombineTwo_SuccessForTwoContigousUmlimitedRanges()
//    {
//
//        $range1 = Range::lessThan(20);
//        $range2 = Range::greaterThan(20);
//
//        $combined = Range::combineTwo($range1, $range2);
//
//        $this->assertInstanceOf(NegativeInfinityRangeMarginInterface::class, $combined->getLeft());
//        $this->assertInstanceOf(PositiveInfinityRangeMarginInterface::class, $combined->getRight());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_CombineTwo_SuccessTwoContigousLimitedRanges()
//    {
//        $expectedStart = 0;
//        $expectedEnd = 40;
//        $range1 = Range::between(20, 0);
//        $range2 = Range::between(40, 20);
//
//        $combined = Range::combineTwo($range1, $range2);
//
//        $this->assertEquals($expectedStart, $combined->getLeft()->getValue());
//        $this->assertEquals($expectedEnd, $combined->getRight()->getValue());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Touches_TrueForRangesThatAreTouchingEachOther()
//    {
//        $range1 = Range::between(-5, 5);
//        $range2 = Range::between(5, 10);
//
//        $this->assertTrue($range1->touches($range2));
//
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Touches_TrueForRangesThatAreTouchingEachOtherBackwards()
//    {
//        $range1 = Range::between(-5, 5);
//        $range2 = Range::between(5, 10);
//
//        $this->assertTrue($range2->touches($range1));
//
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Touches_FalseForRangesThatAreNotTouchingEachOther()
//    {
//        $range1 = Range::between(-5, 5);
//        $range2 = Range::between(8, 10);
//
//        $this->assertFalse($range1->touches($range2));
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Touches_FalseForRangesThatAreNotTouchingEachOtherBackwards()
//    {
//        $range1 = Range::between(-5, 5);
//        $range2 = Range::between(8, 10);
//
//        $this->assertFalse($range2->touches($range1));
//    }
//    #endregion
//
//    #region Split (value) tests
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginWithinLimitedRange()
//    {
//        $range = new Range();
//        $margin = 0;
//        $expectedSplittedRangesCount = 2;
//
//        $splittedRanges = $range->split($margin);
//
//        $this->assertEquals($expectedSplittedRangesCount, \count($splittedRanges));
//
//        $this->assertTrue($range->getLeft()->isEqualTo($splittedRanges[0]->getStart()));
//        $this->assertEquals($margin, $splittedRanges[0]->getEnd()->getValue());
//
//        $this->assertTrue($range->getRight()->isEqualTo($splittedRanges[1]->getEnd()));
//        $this->assertEquals($margin, $splittedRanges[1]->getStart()->getValue());
//    }
//
//    /**
//     * @test
//     * @expectedException maxlzp\range\Exceptions\SplitValueIsOutRangeException
//     */
//    public function Range_Split_ThrowExceptionForMarginOufsideOfRange()
//    {
//        $range = Range::between(-5, 5);
//        $margin = 10;
//
//        $splittedRanges = $range->split($margin);
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginWithinLessThanNumberRange()
//    {
//        $range = Range::lessThan(10);
//        $margin = 0;
//        $expectedSplittedRangesCount = 2;
//
//        $splittedRanges = $range->split($margin);
//
//        $this->assertEquals($expectedSplittedRangesCount, \count($splittedRanges));
//
//        $this->assertTrue($range->getLeft()->IsEqualTo($splittedRanges[0]->getStart()));
//        $this->assertEquals($margin, $splittedRanges[0]->getEnd()->getValue());
//
//        $this->assertTrue($range->getRight()->isEqualTo($splittedRanges[1]->getEnd()));
//        $this->assertEquals($margin, $splittedRanges[1]->getStart()->getValue());
//    }
//
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginWithinGreaterThanNumberRange()
//    {
//        $range = Range::greaterThan(-10);
//        $margin = 0;
//        $expectedSplittedRangesCount = 2;
//
//        $splittedRanges = $range->split($margin);
//
//        $this->assertEquals($expectedSplittedRangesCount, \count($splittedRanges));
//
//        $this->assertTrue($range->getLeft()->isEqualTo($splittedRanges[0]->getStart()));
//        $this->assertEquals($margin, $splittedRanges[0]->getEnd()->getValue());
//
//        $this->assertTrue($range->getRight()->isEqualTo($splittedRanges[1]->getEnd()));
//        $this->assertEquals($margin, $splittedRanges[1]->getStart()->getValue());
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginsCollectionWithinUnlimitedRange()
//    {
//        $range = new Range();
//        $margins = [-5, 5];
//
//        $this->runAssertionsForSplitRangeToMarginsCollection($range, $margins);
//    }
//
//    /**
//     * @test
//     * @expectedException maxlzp\range\Exceptions\SplitValueIsOutRangeException
//     */
//    public function Range_Split_ThrowExceptionForMarginsCollectionWithMarginOufsideOfRange()
//    {
//        $range = Range::between(0, 10);
//        $margins = [-5, 5];
//
//        $splittedRanges = $range->split($margins);
//    }
//
//    /**
//     * @test
//     * @expectedException maxlzp\range\Exceptions\SplitValueIsOutRangeException
//     */
//    public function Range_Split_ThrowExceptionForMarginsCollectionWithMarginOufsideOfRangeSecond()
//    {
//        $range = Range::between(-10, 0);
//        $margins = [-5, 5];
//
//        $splittedRanges = $range->split($margins);
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginsCollectionWithinLimitedBetweenRange()
//    {
//        $range = Range::between(-10, 10);
//        $margins = [-5, 5];
//
//        $this->runAssertionsForSplitRangeToMarginsCollection($range, $margins);
//    }
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginsCollectionWithinLimitedLessThanNumberRange()
//    {
//        $range = Range::lessThan(10);
//        $margins = [-5, 5];
//
//        $this->runAssertionsForSplitRangeToMarginsCollection($range, $margins);
//    }
//
//
//    /**
//     * @test
//     */
//    public function Range_Split_SuccesForMarginsCollectionWithinGreaterThanNumberRange()
//    {
//        $range = Range::greaterThan(-10);
//        $margins = [-5, 5];
//
//        $this->runAssertionsForSplitRangeToMarginsCollection($range, $margins);
//    }
//
//
//    /**
//     * Run Assertions For Split method of Range class with collection margins as a parameter
//     * @param IRange $rangeToSplit Range to  try to split
//     * @param array $margins Collections of margins to cplit range to
//     */
//    private function runAssertionsForSplitRangeToMarginsCollection(IRange $rangeToSplit, array $margins)
//    {
//        $expectedSplittedRangesCount = \count($margins) + 1;
//
//        $splittedRanges = $rangeToSplit->splitMany($margins);
//
//        $this->assertEquals($expectedSplittedRangesCount, \count($splittedRanges));
//
//        $this->assertTrue($rangeToSplit->getStart()->IsEqualTo($splittedRanges[0]->getStart()));
//        $this->assertEquals($margins[0], $splittedRanges[0]->getEnd()->getValue());
//        $this->assertEquals($margins[0], $splittedRanges[1]->getStart()->getValue());
//        $this->assertEquals($margins[1], $splittedRanges[1]->getEnd()->getValue());
//        $this->assertEquals($margins[1], $splittedRanges[2]->getStart()->getValue());
//        $this->assertTrue($rangeToSplit->getEnd()->isEqualTo($splittedRanges[2]->getEnd()));
//    }
}
