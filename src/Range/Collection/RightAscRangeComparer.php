<?php

namespace maxlzp\range\Range\Collection;

use maxlzp\range\Range\RangeInterface;

/**
 * Class RightAscRangeComparer
 * @package maxlzp\range\Range\Collection
 */
class RightAscRangeComparer extends RangeComparer
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
    function compare(RangeInterface $first, RangeInterface $second): int
    {
        return $first->getRight()->getValue() <=> $second->getRight()->getValue();
    }
}