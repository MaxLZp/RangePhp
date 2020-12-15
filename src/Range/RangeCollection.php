<?php

namespace maxlzp\range\Range;

use Ramsey\Collection\Collection;

/**
 * Class RangeCollection
 * @package maxlzp\range\Range
 */
class RangeCollection extends Collection
{
    /**
     * RangeCollection constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct(RangeInterface::class, $data);
    }
}