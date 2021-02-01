<?php

namespace maxlzp\range\tests\Range\Collection;

use maxlzp\range\Range\Collection\LeftAscRangeComparer;
use maxlzp\range\Range\Collection\LeftDescRangeComparer;
use maxlzp\range\Range\Collection\RangeCollection;
use maxlzp\range\Range\Collection\RightAscRangeComparer;
use maxlzp\range\Range\Collection\RightDescRangeComparer;
use maxlzp\range\Range\Range;
use PHPUnit\Framework\TestCase;

class RangeCollectionTest extends TestCase
{
    /**
     * @test
     * @dataProvider collectionProvider
     */
    public function shouldSortCollectionInAscOrderByLeftMarginValue($collection)
    {
        $comparer = new LeftAscRangeComparer();
        $sorted = $collection->sortWith($comparer);

        $this->assertTrue($sorted[0]->getLeft()->isEqualToValue(3));
        $this->assertTrue($sorted[1]->getLeft()->isEqualToValue(5));
        $this->assertTrue($sorted[2]->getLeft()->isEqualToValue(7));
        $this->assertTrue($sorted[3]->getLeft()->isEqualToValue(9));
    }

    /**
     * @test
     * @dataProvider collectionProvider
     */
    public function shouldSortCollectionInDescOrderByLeftMarginValue($collection)
    {
        $comparer = new LeftDescRangeComparer();
        $sorted = $collection->sortWith($comparer);

        $this->assertTrue($sorted[0]->getLeft()->isEqualToValue(9));
        $this->assertTrue($sorted[1]->getLeft()->isEqualToValue(7));
        $this->assertTrue($sorted[2]->getLeft()->isEqualToValue(5));
        $this->assertTrue($sorted[3]->getLeft()->isEqualToValue(3));
    }

    /**
     * @test
     * @dataProvider collectionProvider
     */
    public function shouldSortCollectionInAscOrderByRightMarginValue($collection)
    {
        $comparer = new RightAscRangeComparer();
        $sorted = $collection->sortWith($comparer);

        $this->assertTrue($sorted[0]->getRight()->isEqualToValue(4));
        $this->assertTrue($sorted[1]->getRight()->isEqualToValue(8));
        $this->assertTrue($sorted[2]->getRight()->isEqualToValue(9));
        $this->assertTrue($sorted[3]->getRight()->isEqualToValue(10));
    }

    /**
     * @test
     * @dataProvider collectionProvider
     */
    public function shouldSortCollectionInDescOrderByRightMarginValue($collection)
    {
        $comparer = new RightDescRangeComparer();
        $sorted = $collection->sortWith($comparer);

        $this->assertTrue($sorted[0]->getRight()->isEqualToValue(10));
        $this->assertTrue($sorted[1]->getRight()->isEqualToValue(9));
        $this->assertTrue($sorted[2]->getRight()->isEqualToValue(8));
        $this->assertTrue($sorted[3]->getRight()->isEqualToValue(4));
    }

    public function collectionProvider()
    {
        $collection = new RangeCollection();
        $collection->add(Range::between(9, 10));
        $collection->add(Range::between(5, 8));
        $collection->add(Range::between(7, 9));
        $collection->add(Range::between(3, 4));
        return [
            [$collection]
        ];
    }
}
