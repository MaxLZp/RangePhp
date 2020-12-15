<?php
/**
 * @author   MaxLZp <lmax_job@mail.ru>
 */

namespace maxlzp\range\Range;

/**
 * Class ClosedRange
 *
 * @package Range
 */
class ClosedRange extends RangeImpl
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
        return $this->getLeft()->isLessOrEqualThanValue($value)
            && $this->getRight()->isGreaterOrEqualThanValue($value);
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
        return $this->getLeft()->isLessOrEqualThan($other->getLeft())
            && $this->getRight()->isGreaterOrEqualThan($other->getRight());
    }

    #endregion RangeInterface implementation

    /**
     * String representation of the range
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf("[%s, %s]", $this->getLeft(), $this->getRight());
    }
}