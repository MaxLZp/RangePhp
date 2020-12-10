<?php

namespace maxlzp\range\tests;


use maxlzp\range\Margin\NegativeInfinityMargin;
use PHPUnit\Framework\TestCase;

/**
 * Class NegativeInfinityMarginTest
 *
 * @package maxlzp\range\tests
 */
class NegativeInfinityMarginTest extends TestCase
{

    /**
     * @test
     */
    public function shouldBeEqualToNegativeInfinityMargin()
    {
        $margin = new NegativeInfinityMargin();
        $margin2 = new NegativeInfinityMargin();

        $this->assertTrue($margin->isEqualTo($margin2));
    }

    /**
     * @test
     */
    public function shouldBeEqualToFiniteValue()
    {
        $margin = new NegativeInfinityMargin();
        $value = 123;

        $this->assertFalse($margin->isEqualToValue($value));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterThanOtherNegativeInfinityMargin()
    {
        $margin = new NegativeInfinityMargin();
        $margin2 = new NegativeInfinityMargin();

        $this->assertFalse($margin->isGreaterThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotGreaterThanFiniteValue()
    {
        $margin = new NegativeInfinityMargin();
        $value = 123;

        $this->assertFalse($margin->isGreaterThanValue($value));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualOtherNegativeInfinityMargin()
    {
        $margin = new NegativeInfinityMargin();
        $margin2 = new NegativeInfinityMargin();

        $this->assertTrue($margin->isGreaterOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterOrEqualThanFiniteValue()
    {
        $margin = new NegativeInfinityMargin();
        $value = 123;

         $this->assertFalse($margin->isGreaterOrEqualThanValue($value));
    }

    /**
     * @test
     */
    public function shouldNotBeLessThanOtherNegativeInfinityMargin()
    {
        $margin = new NegativeInfinityMargin();
        $margin2 = new NegativeInfinityMargin();

        $this->assertFalse($margin->isLessThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeLessThanFiniteValue()
    {
        $margin = new NegativeInfinityMargin();
        $value = 123;

        $this->assertTrue($margin->isLessThanValue($value));
    }

    /**
     * @test
     */
    public function shouldBeLessOrEqualThanOtherNegativeInfinityMargin()
    {
        $margin = new NegativeInfinityMargin();
        $margin2 = new NegativeInfinityMargin();

        $this->assertTrue($margin->isLessOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeLessOrEqualThanFiniteValue()
    {
        $margin = new NegativeInfinityMargin();
        $value = 123;

        $this->assertTrue($margin->isLessOrEqualThanValue($value));
    }
}
