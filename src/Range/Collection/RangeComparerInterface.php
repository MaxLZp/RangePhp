<?php

namespace maxlzp\range\Range\Collection;

use maxlzp\range\Range\RangeInterface;

/**
 * Interface RangeComparerInterface
 *
 * @package maxlzp\range\Range\Collection
 */
interface RangeComparerInterface
{

    /**
     * Compares two Ranges
     *
     * @param RangeInterface $first
     * @param RangeInterface $second
     *
     * @return int 0 - if Ranges are equal; greater than 0 if first is less than second
     *          less than 0 - if second Range is greater than second
     */
    function __invoke(RangeInterface $first, RangeInterface $second): int;

    /**
     * Compares two Ranges
     *
     * @param RangeInterface $first
     * @param RangeInterface $second
     *
     * @return int 0 - if Ranges are equal; greater than 0 if first is less than second
     *          less than 0 - if second Range is greater than second
     */
    function compare(RangeInterface $first, RangeInterface $second): int;

}