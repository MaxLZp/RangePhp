<?php

namespace maxlzp\range\Range\Collection;

use maxlzp\range\Range\RangeInterface;

/**
 * Class RightDescRangeComparer
 * @package maxlzp\range\Range\Collection
 */
class RightDescRangeComparer extends RangeComparer
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
        return  $second->getRight()->getValue() <=> $first->getRight()->getValue();
    }
}