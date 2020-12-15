<?php

namespace maxlzp\range\tests\Range\Mocks;

use maxlzp\range\Range\RangeImpl;
use maxlzp\range\Range\RangeInterface;

/**
 * Class RangeImplMock
 * @package maxlzp\range\tests\Range\Mocks
 */
class RangeImplMock extends RangeImpl
{

    /**
     * Check if value belong to the range
     *
     * @param float $value Value to test
     *
     * @return bool True if range includes value; false - otherwise</returns>
     */
    public function includesValue(float $value): bool
    {
        // TODO: Implement includesValue() method.
    }

    /**
     * Check if range includes other range completely
     *
     * @param RangeInterface $other Other range
     *
     * @return bool
     */
    public function includes(RangeInterface $other): bool
    {
        // TODO: Implement includes() method.
    }
}