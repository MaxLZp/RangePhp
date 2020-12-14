<?php

namespace maxlzp\range\Range;

use maxlzp\range\Margin\Margin;
use maxlzp\range\Margin\NegativeInfinityMargin;
use maxlzp\range\Margin\PositiveInfinityMargin;

/**
 * Class Range
 *
 * @package maxlzp\range
 */
abstract class Range implements RangeInterface
{

    /**
     * Create new ClosedRange with left and right margins
     *
     * @param float $left  Range left value
     * @param float $right Range right value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function between(float $left, float $right): RangeInterface
    {
        return new ClosedRange(new Margin($left), new Margin($right));
    }

    /**
     * Create new OpenRange with left and right margins
     *
     * @param float $left  Range left value
     * @param float $right Range right value
     *
     * @return RangeInterface
     *
     * @throws \Exception
     */
    public static function betweenOpen(float $left, float $right): RangeInterface
    {
        return new OpenRange(new Margin($left), new Margin($right));
    }

    /**
     * Create new LeftOpenRange with left and right margins
     *
     * @param float $left  Range left value
     * @param float $right Range right value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function betweenLeftOpen(float $left, float $right): RangeInterface
    {
        return new LeftOpenRange(new Margin($left), new Margin($right));
    }

    /**
     * Create new RightOpenRange with left and right margins
     *
     * @param float $left  Range left value
     * @param float $right Range right value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function betweenRightOpen(float $left, float $right): RangeInterface
    {
        return new RightOpenRange(new Margin($left), new Margin($right));
    }

    /**
     * Create new Range with supplied left value and infinite right value
     *
     * @param float $left Range start value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function greaterThan(float $left): RangeInterface
    {
        return new OpenRange(
            new Margin($left),
            new PositiveInfinityMargin());
    }

    /**
     * Create new Range with supplied left value and infinite right value
     *
     * @param float $left Range start value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function greaterOrEqualThan(float $left): RangeInterface
    {
        return new RightOpenRange(
            new Margin($left),
            new PositiveInfinityMargin());
    }

    /**
     * Create new Range with supplied right value and infinite(negative) left value
     *
     * @param float $right Range end value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function lessThan(float $right): RangeInterface
    {
        return new OpenRange(
            new NegativeInfinityMargin(),
            new Margin($right));
    }

    /**
     * Create new Range with supplied right value and infinite(negative) left value
     *
     * @param float $right Range end value
     *
     * @return RangeInterface New Range instance
     *
     * @throws \Exception
     */
    public static function lessOrEqualThan(float $right): RangeInterface
    {
        return new LeftOpenRange(
            new NegativeInfinityMargin(),
            new Margin($right)
            );
    }

    #endregion constructors

    #region static methods
//
//    /**
//     * Checks if Ranges within the collection have no gaps between(overlaps are allowed)
//     *
//     * @param array $ranges Collection to check
//     *
//     * @return bool True if collection is contiguous; false otherwise
//     *
//     * @throws \Exception
//     */
//    public static function isContiguous(array $ranges): bool
//    {
//        self::guardNullArgument($ranges);
//        $sorted = self::sortRanges($ranges);
//        for ($i = 0; $i < \count($sorted) - 1; $i++) {
//            if (!$sorted[$i]->getEnd()->isGreaterOrEqualThan($sorted[$i + 1]->getStart())) {
//                return false;
//            }
//        }
//        return true;
//    }
}