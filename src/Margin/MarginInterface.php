<?php
namespace maxlzp\range\Margin;

/**
 * Interface MarginInterface
 * @package maxlzp\range\Margin
 */
interface MarginInterface
{
    /**
     * Margin value
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Determines if this margin is equal to other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margins are equal; False otherwise
     */
    public function isEqualTo(MarginInterface $other);

    /**
     * Determines if this margin value is equal to a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value and a given value are equal; False otherwise
     */
    public function isEqualToValue($value);

    /**
     * Determines if this margin is greater than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is greater than given margin; False otherwise
     */
    public function isGreaterThan(MarginInterface $other);

    /**
     * Determines if this margin is greater than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is greater than given value; False otherwise
     */
    public function isGreaterThanValue($value);

    /**
     * Determines if this margin is greater or equal than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is greater or equal than given margin; False otherwise
     */
    public function isGreaterOrEqualThan(MarginInterface $other);

    /**
     * Determines if this margin is greater or equal than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is greater or equal than given value; False otherwise
     */
    public function isGreaterOrEqualThanValue($value);

    /**
     * Determines if this margin is less than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is less than given margin; False otherwise
     */
    public function isLessThan(MarginInterface $other);

    /**
     * Determines if this margin is less than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is less than given value; False otherwise
     */
    public function isLessThanValue($value);

    /**
     * Determines if this margin is less or equal than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is less or equal than given margin; False otherwise
     */
    public function isLessOrEqualThan(MarginInterface $other);

    /**
     * Determines if this margin is less or equal than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is less or equal than given value; False otherwise
     */
    public function isLessOrEqualThanValue($value);
}


