<?php

namespace maxlzp\range\tests\_Mocks\Range\Collection;

use maxlzp\range\Range\Collection\RangeComparer;
use maxlzp\range\Range\RangeInterface;

class RangeComparerMock extends RangeComparer
{

    /**
     * Compares two Ranges
     *
     * @param RangeInterface $first
     * @param RangeInterface $second
     *
     * @return int 0 - if Ranges are equal; less than 0 if first is less than second
     *          grater than 0 - if second Range is greater than second
     */
    function compare(RangeInterface $first, RangeInterface $second): int
    {
        return $second->getLeft()->getValue() <=> $first->getLeft()->getValue();
    }
}