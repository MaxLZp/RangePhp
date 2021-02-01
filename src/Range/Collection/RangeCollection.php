<?php

namespace maxlzp\range\Range\Collection;

use maxlzp\range\Range\RangeInterface;
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

    /**
     * @param RangeComparerInterface $comparer
     *
     * @return RangeCollection
     * @throws \Exception
     */
    public function sortWith(RangeComparerInterface $comparer): RangeCollection
    {
        $array = $this->toArray();
        if (\usort($array, $comparer))
        {
            return new self($array);
        }
        throw new \Exception("Sorting error.");
    }
}