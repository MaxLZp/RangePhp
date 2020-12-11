<?php
namespace maxlzp\range\Margin;

/**
 * Class NegativeInfinityMargin
 *
 * @package maxlzp\range\Margin
 */
class NegativeInfinityMargin extends Margin
{
    /**
     * NegativeInfinityMarginInterface constructor.
     */
    public function __construct()
    {
        parent::__construct(-INF);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return \sprintf("-%s", MarginConstants::INFINITY_STRING);
    }

}
