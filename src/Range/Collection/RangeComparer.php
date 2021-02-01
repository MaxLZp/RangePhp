<?php

namespace maxlzp\range\Range\Collection;

use maxlzp\range\Range\RangeInterface;

/**
 * Class RangeComparer
 * @package maxlzp\range\Range\Collection
 */
abstract class RangeComparer implements RangeComparerInterface
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
    function __invoke(RangeInterface $first, RangeInterface $second): int
    {
        return $this->compare($first, $second);
    }
}