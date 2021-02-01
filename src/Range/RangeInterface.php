<?php

namespace maxlzp\range\Range;

use maxlzp\range\Margin\MarginInterface;
use maxlzp\range\Range\Collection\RangeCollection;

/**
 * Interface RangeInterface
 *
 * @package maxlzp\range
 */
interface RangeInterface
{
    /**
     * Return a Range that represents a gap between two ranges
     *
     * @param RangeInterface $other Second Range
     *
     * @return RangeInterface Range that represents gat between two Ranges
     */
    public function gap(RangeInterface $other): RangeInterface;

    /**
     * Starting margin of the range
     *
     * @return MarginInterface
     */
    public function getLeft(): MarginInterface;

    /**
     * Ending margin of the range
     *
     * @return MarginInterface
     */
    public function getRight(): MarginInterface;

    /**
     * Range width
     *
     * @return float
     */
    public function getWidth(): float;

    /**
     * Check if value belong to the range
     *
     * @param float $value Value to test
     *
     * @return bool True if range includes value; false - otherwise</returns>
     */
    public function includesValue(float $value): bool;

    /**
     * Check if range includes other range completely
     *
     * @param RangeInterface $other Other range
     *
     * @return bool
     */
    public function includes(RangeInterface $other): bool;

    /**
     * Whether Range is empty or not(contains single value)
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Split Range at given value
     *
     * @param float $value
     *
     * @return RangeCollection
     */
    public function splitAt(float $value): RangeCollection;

    /**
     * Determines if some range is touching other range( some margin of the range is equal to some other range margin)
     *
     * @param RangeInterface $other Range to test
     *
     * @return bool True if touches; false - otherwise
     */
    public function touches(RangeInterface $other): bool;

}