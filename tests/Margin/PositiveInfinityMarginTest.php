<?php

namespace maxlzp\range\tests;

use maxlzp\range\Margin\PositiveInfinityMargin;
use PHPUnit\Framework\TestCase;

/**
 * Class PositiveInfinityMarginTest
 * @package maxlzp\range\tests
 */
class PositiveInfinityMarginTest extends TestCase
{

    /**
     * @test
     */
    public function shouldBeEqualToOtherPositiveInfinityMargin()
    {
        $margin = new PositiveInfinityMargin();
        $margin2 = new PositiveInfinityMargin();

        $this->assertTrue($margin->isEqualTo($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualToFiniteValue()
    {
        $margin = new PositiveInfinityMargin();
        $value = 123;

        $this->assertFalse($margin->isEqualToValue($value));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterThanOtherPositiveInfinityMargin()
    {
        $margin = new PositiveInfinityMargin();
        $margin2 = new PositiveInfinityMargin();

        $this->assertFalse($margin->isGreaterThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeGreaterThanFiniteValue()
    {
        $margin = new PositiveInfinityMargin();
        $value = 123;

        $this->assertTrue($margin->isGreaterThanValue($value));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualThanOtherPositiveInfinityMargin()
    {
        $margin = new PositiveInfinityMargin();
        $margin2 = new PositiveInfinityMargin();

        $this->assertTrue($margin->isGreaterOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualThanFiniteValue()
    {
        $margin = new PositiveInfinityMargin();
        $value = 123;

         $this->assertTrue($margin->isGreaterOrEqualThanValue($value));
    }

    /**
     * @test
     */
    public function shouldNotBeLessThanOtherPositiveInfinityMargin()
    {
        $margin = new PositiveInfinityMargin();
        $margin2 = new PositiveInfinityMargin();

        $this->assertFalse($margin->isLessThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeLessaThanFiniteValue()
    {
        $margin = new PositiveInfinityMargin();
        $value = 123;

        $this->assertFalse($margin->isLessThanValue($value));
    }

    /**
     * @test
     */
    public function shouldBeLessOrEqualThanOtherPositiveInfinityMargin()
    {
        $margin = new PositiveInfinityMargin();
        $margin2 = new PositiveInfinityMargin();

        $this->assertTrue($margin->isLessOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeLessOrEqualThanFiniteValue()
    {
        $margin = new PositiveInfinityMargin();
        $value = 123;

        $this->assertFalse($margin->isLessOrEqualThanValue($value));
    }
}
