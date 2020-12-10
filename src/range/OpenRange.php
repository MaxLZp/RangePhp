<?php
/**
 * @author   MaxLZp <lmax_job@mail.ru>
 */

namespace maxlzp\range\Range;

use maxlzp\range\Margin\MarginInterface;
use maxlzp\range\Range\Range;
use maxlzp\range\Range\RangeInterface;

/**
 * Class OpenRange
 *
 * @package Range
 */
class OpenRange extends Range
{

    #region RangeInterface implementation


    /**
     * Check if value belong to the range
     *
     * @param mixed $value Value to test
     *
     * @return bool True if range includes value; false - otherwise</returns>
     */
    public function includesValue($value): bool
    {
        return $this->getLeft()->isLessThanValue($value)
            && $this->getRight()->isGreaterThanValue($value);
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
        return $this->getLeft()->isLessThan($other->getLeft())
            && $this->getRight()->isGreaterThan($other->getRight());
    }

    #endregion RangeInterface implementation

    /**
     * String representation of the range
     *
     * @return string
     */
    public function __toString()
    {
        return \sprintf("(%s, %s)", $this->getLeft(), $this->getRight());
    }
}