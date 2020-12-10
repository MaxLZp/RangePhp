<?php

namespace maxlzp\range\Range;

use maxlzp\range\Margin\Margin;
use maxlzp\range\Margin\MarginInterface;
use maxlzp\range\Margin\NegativeInfinityMargin;
use maxlzp\range\Margin\PositiveInfinityMargin;
use maxlzp\range\Range\Exception\NonContiguousRangesCombinationAttemptException;
use maxlzp\range\Range\ClosedRange;
use maxlzp\range\Range\LeftOpenRange;
use maxlzp\range\Range\OpenRange;
use maxlzp\range\Range\RightOpenRange;


/**
 * Class Range
 *
 * @package maxlzp\range
 */
abstract class Range implements RangeInterface
{
    /**
     * MarginInterface left range margin
     */
    protected $left;
    /**
     * MarginInterface tight range margin
     */
    protected $right;

    #region constructors

    /**
     * Range constructor.
     *
     * @param MarginInterface $left
     * @param MarginInterface $right
     */
    protected function __construct(MarginInterface $left, MarginInterface $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

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

    /**
     * Checks if Ranges within the collection have no gaps between(overlaps are allowed)
     *
     * @param array $ranges Collection to check
     *
     * @return bool True if collection is contiguous; false otherwise
     *
     * @throws \Exception
     */
    public static function isContiguous(array $ranges): bool
    {
        self::guardNullArgument($ranges);
        $sorted = self::sortRanges($ranges);
        for ($i = 0; $i < \count($sorted) - 1; $i++) {
            if (!$sorted[$i]->getEnd()->isGreaterOrEqualThan($sorted[$i + 1]->getStart())) {
                return false;
            }
        }
        return true;
    }
//
//    /**
//     * Combine ranges into one
//     *
//     * @param array $ranges Array of Range's to combine
//     *
//     * @return RangeInterface Combined Range
//     *
//     * @throws \Exception
//     * @throws NonContiguousRangesCombinationAttemptException
//     */
//    public static function combineMany(array $ranges): RangeInterface
//    {
//        self::guardNullArgument($ranges);
//        $sorted = self::sortRanges($ranges);
//        if (self::isContiguous($sorted)) {
//            return self::constructWithMargins($sorted[0]->getStart(),
//                $sorted[\count($sorted) - 1]->getEnd());
//        }
//        throw new NonContiguousRangesCombinationAttemptException();
//    }
//
//    /**
//     * Combine two ranges into one
//     *
//     * @param RangeInterface $range1 First Range
//     * @param RangeInterface $range2 Second Range
//     *
//     * @return RangeInterface
//     *
//     * @throws \Exception
//     */
//    public static function combineTwo(RangeInterface $range1, RangeInterface $range2): RangeInterface
//    {
//        self::guardNullArgument($range1);
//        self::guardNullArgument($range2);
//        return self::combineMany([
//            $range1,
//            $range2]);
//    }

    #endregion static methods

    /**
     * String representation of the range
     * @return string
     */
    public function __toString()
    {
        return \sprintf("[%s, %s]", $this->getLeft(), $this->getRight());
    }

     #region RangeInterface implementation


    /**
     * Return a Range that represents a gap between two ranges
     *
     * @param RangeInterface $other Second Range
     *
     * @return RangeInterface Range that represents gat between two Ranges
     *
     * @throws \Exception
     */
    public function gap(RangeInterface $other)
    {
        self::guardNullArgument($other);
        $sorted = self::sortRanges([$this, $other]);
        return self::constructWithMargins($sorted[0]->getEnd(), $sorted[1]->getStart());
    }

    /**
     * Ending margin of the range
     *
     * @return MarginInterface
     */
    public function getRight(): MarginInterface
    {
        return $this->right;
    }

    /**
     * Starting margin of the range
     *
     * @return MarginInterface
     */
    public function getLeft(): MarginInterface
    {
        return $this->left;
    }

    /**
     * Range width
     * @return mixed
     */
    public function getWidth()
    {
        return $this->getRight()->getValue() - $this->getLeft()->getValue();
    }

    /**
     * Whether Range is empty or not(contains one value)
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->getLeft()->isEqualTo($this->getRight());
    }

    /**
     * Determines if some range is touching other range( some margin of the range is equal to some other range margin)
     *
     * @param RangeInterface $other Range to test
     *
     * @return bool True if touches; false - otherwise
     *
     * @throws \Exception
     */
    public function touches(RangeInterface $other): bool
    {
        self::guardNullArgument($other);
        return $this->getLeft()->isEqualTo($other->getRight()) ||
            $this->getRight()->isEqualTo($other->getLeft());
    }
//
//    /**
//     * Split Range to 2 ranges
//     * @param mixed $margin Margin to split range at.
//     * @return array Collection of 2 Ranges
//     * @throws SplitValueIsOutRangeException
//     */
//    public function split($margin)
//    {
//        self::guardNullArgument($margin);
//        if (!$this->includesValue($margin)) {
//            throw new SplitValueIsOutRangeException();
//        }
//
//        return [
//            self::constructWithMargins($this->getLeft(), new Margin($margin)),
//            self::constructWithMargins(new Margin($margin), $this->getRight()),
//        ];
//    }
//
//    /**
//     * Split Range to several ranges
//     * @param array $margins Margins to split Range at
//     * @return mixed
//     */
//    public function splitMany(array $margins)
//    {
//        self::guardNullArgument($margins);
//        $splittedRanges = [];
//        $rangeToSplit = $this;
//        foreach ($margins as $margin) {
//            $splittedDuo = $rangeToSplit->split($margin);
//            $splittedRanges[] = $splittedDuo[0];
//            $rangeToSplit = $splittedDuo[1];
//        }
//        $splittedRanges[] = $rangeToSplit;
//        return $splittedRanges;
//    }

    #endregion RangeInterface implementation

    /**
     * Guards from null method argument
     * @param mixed $argument Argument to check
     * @param string $exceptionMessage Message for exception
     * @throws \Exception
     */
    protected static function guardNullArgument($argument, string $exceptionMessage = "Argument cannot be null")
    {
        if (null === $argument) {
            throw new \Exception($exceptionMessage);
        }
    }

    /**
     * Sorts collection of ranges by their Start property
     * @param array $unsorted Unsorted Ranges collection
     * @return array Sorted collection
     */
    protected static function sortRanges(array $unsorted)
    {
        $sorted = &$unsorted;
        \usort($sorted, function (RangeInterface $a, RangeInterface $b) {
            if ($a->getLeft()->isEqualTo($b->getLeft())) {
                return 0;
            }
            if ($a->getLeft()->isLessThan($b->getLeft())) {
                return -1;
            }
            return 1;
        });

        return $sorted;
    }
//
//    /**
//     * Sorts collection of rangeMargins by their Value
//     *
//     * @param array $unsorted Unsorted RangeMargins collection
//     *
//     * @return array Sorted collection
//     */
//    protected static function sortMargins(array $unsorted)
//    {
//        $sorted = $unsorted;
//        \usort($sorted, function ($a, $b) {
//            if ($a === $b) {
//                return 0;
//            }
//            return ($a < $b) ? -1 : 1;
//        });
//        return $sorted;
//    }
}