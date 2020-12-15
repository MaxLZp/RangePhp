<?php
namespace maxlzp\range\Margin;

/**
 * Class Margin
 *
 * @package maxlzp\range\Margin
 */
class Margin implements MarginInterface
{
    /**
     * @var mixed Margin value
     */
    protected $value;

    /**
     * Margin constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->guardNullMargin($value, "Margin value cannot be null.");
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf("%s", $this->value);
    }

    #region MarginInterface implementation

    /**
     * Margin value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Determines if this margin is equal to other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margins are equal; False otherwise
     */
    public function isEqualTo(MarginInterface $other)
    {
        $this->guardNullMargin($other, "Cannot compare to null margin.");
        return $this->isEqualToValue($other->getValue());
    }

    /**
     * Determines if this margin value is equal to a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value and a given value are equal; False otherwise
     */
    public function isEqualToValue($value)
    {
        $this->guardNullMargin($value, "Cannot compare margin to null value.");
        return $this->getValue() == $value;
    }

    /**
     * Determines if this margin is greater than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is greater than given margin; False otherwise
     */
    public function isGreaterThan(MarginInterface $other)
    {
        $this->guardNullMargin($other, "Cannot compare to null margin");
        return $this->isGreaterThanValue($other->getValue());
    }

    /**
     * Determines if this margin is greater than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is greater than given value; False otherwise
     */
    public function isGreaterThanValue($value)
    {
        $this->guardNullMargin($value, "Cannot compare margin to null value.");
        return $this->getValue() > $value;
    }

    /**
     * Determines if this margin is greater or equal than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is greater or equal than given margin; False otherwise
     */
    public function isGreaterOrEqualThan(MarginInterface $other)
    {
        $this->guardNullMargin($other, "Cannot compare to null margin");
        return $this->isGreaterThanValue($other->getValue()) ||
            $this->isEqualTo($other);
    }

    /**
     * Determines if this margin is greater or equal than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is greater or equal than given value; False otherwise
     */
    public function isGreaterOrEqualThanValue($value)
    {
        $this->guardNullMargin($value, "Cannot compare margin to null value.");
        return $this->isGreaterThanValue($value) || $this->isEqualToValue($value);
    }

    /**
     * Determines if this margin is less than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is less than given margin; False otherwise
     */
    public function isLessThan(MarginInterface $other)
    {
        $this->guardNullMargin($other, "Cannot compare to null margin");
        return $this->isLessThanValue($other->getValue());
    }

    /**
     * Determines if this margin is less than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is less than given value; False otherwise
     */
    public function isLessThanValue($value)
    {
        $this->guardNullMargin($value, "Cannot compare margin to null value.");
        return $this->getValue() < $value;
    }

    /**
     * Determines if this margin is less or equal than other
     *
     * @param MarginInterface $other Margin to compare with
     *
     * @return bool True if margin is less or equal than given margin; False otherwise
     */
    public function isLessOrEqualThan(MarginInterface $other)
    {
        $this->guardNullMargin($other, "Cannot compare to null margin");
        return $this->isLessThanValue($other->getValue()) ||
            $this->isEqualTo($other);
    }

    /**
     * Determines if this margin is less or equal than a given value
     *
     * @param mixed $value Value to compare with
     *
     * @return bool True if margin value is less or equal than given value; False otherwise
     */
    public function isLessOrEqualThanValue($value)
    {
        $this->guardNullMargin($value, "Cannot compare margin to null value.");
        return $this->isLessThanValue($value) ||
            $this->isEqualToValue($value);
    }

    #endregion

    /**
     * Guards null value
     *
     * @param mixed $value
     * @param string $exceptionMessage
     *
     * @throws \InvalidArgumentException
     */
    protected function guardNullMargin($value, string $exceptionMessage)
    {
        if (null === $value) {
            throw new \InvalidArgumentException($exceptionMessage);
        }
    }
}
