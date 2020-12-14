<?php

namespace maxlzp\range\Range;

use maxlzp\range\Margin\MarginInterface;
use maxlzp\range\Range\Exception\NoGapException;

/**
 * Class RangeImpl
 *
 * @package maxlzp\range
 */
abstract class RangeImpl implements RangeInterface
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
    public function __construct(MarginInterface $left, MarginInterface $right)
    {
        // TODO: verify margins order: left must less or equal than right
        $this->left = $left;
        $this->right = $right;
    }

    #endregion constructors

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
    public function gap(RangeInterface $other): RangeInterface
    {
        if ($this->getRight()->isLessOrEqualThan($other->getLeft())) {
            return new static($this->getRight(), $other->getLeft());
        }
        if ($this->getLeft()->isGreaterOrEqualThan($other->getRight())) {
            return new static($other->getRight(), $this->getLeft());
        }

        throw new NoGapException(\sprintf("There is no gap between %s and %s", $this, $other));
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
     * Ending margin of the range
     *
     * @return MarginInterface
     */
    public function getRight(): MarginInterface
    {
        return $this->right;
    }

    /**
     * Range width
     *
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

    #endregion RangeInterface implementation


}