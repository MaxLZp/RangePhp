<?php
namespace maxlzp\range\Margin;


/**
 * Class NegativeInfinityRangeMarginInterface
 * @package maxlzp\range\Margin
 */
class PositiveInfinityMargin extends Margin
{
    /**
     * PositiveInfinityRangeMarginInterface constructor.
     */
    public function __construct()
    {
        parent::__construct(INF);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf("%s", MarginConstants::INFINITY_STRING);
    }
}