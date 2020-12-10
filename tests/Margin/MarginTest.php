<?php
namespace maxlzp\range\tests;

use maxlzp\range\Margin\Margin;
use PHPUnit\Framework\TestCase;

/**
 * Class MarginTest
 *
 * @package maxlzp\range\tests
 */
class MarginTest extends TestCase
{

    /**
     * @test
     */
    public function shouldBeEqualToMarginWithSameValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);
        $margin2 = new Margin($expectedValue);

        $this->assertTrue($margin->isEqualTo($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualToMarginWithDifferentValue()
    {
        $margin = new Margin(123);
        $margin2 = new Margin(24);

        $this->assertFalse($margin->isEqualTo($margin2));
    }

    /**
     * @test
     */
    public function shouldBeEqualToValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);

        $this->assertTrue($margin->isEqualToValue($expectedValue));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualToValue()
    {
        $margin = new Margin(123);

        $this->assertFalse($margin->isEqualToValue(24));
    }

    /**
     * @test
     */
    public function shouldBeGreaterThanOtherMargin()
    {
        $margin = new Margin(123);
        $margin2 = new Margin(0);

        $this->assertTrue($margin->isGreaterThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterThanOtherMarginWithSameValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);
        $margin2 = new Margin($expectedValue);

        $this->assertFalse($margin->isGreaterThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterThanOtherMargin()
    {
        $margin = new Margin(123);
        $margin2 = new Margin(200);

        $this->assertFalse($margin->isGreaterThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeGreaterThanValue()
    {
        $value = 123;
        $margin = new Margin($value);

        $this->assertTrue($margin->isGreaterThanValue($value - 1));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterThanEqualValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);

        $this->assertFalse($margin->isGreaterThanValue($expectedValue));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterThanValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);

        $this->assertFalse($margin->isGreaterThanValue($expectedValue + 1));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualThanOtherMargin()
    {
        $margin = new Margin(123);
        $margin2 = new Margin(0);

        $this->assertTrue($margin->isGreaterOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualThanOtherEqualMargin()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);
        $margin2 = new Margin($expectedValue);

        $this->assertTrue($margin->isGreaterOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldNotBeGreaterOrEqualThanOtherMargin()
    {
        $margin = new Margin(0);
        $margin2 = new Margin(123);

        $this->assertFalse($margin->isGreaterOrEqualThan($margin2));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualThanValue()
    {
        $value = 123;
        $margin = new Margin($value);

        $this->assertTrue($margin->isGreaterOrEqualThanValue($value - 1));
    }

    /**
     * @test
     */
    public function shouldBeGreaterOrEqualThanEqualValue()
    {
        $value = 123;
        $margin = new Margin($value);

        $this->assertTrue($margin->isGreaterOrEqualThanValue($value));
    }

    /**
    * @test
    */
    public function shouldNotBeGreaterOrEqualThanValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);

        $this->assertFalse($margin->isGreaterOrEqualThanValue($expectedValue + 1));
    }

    /**
    * @test
    */
    public function shouldBeLessThanOtherMargin()
    {
        $margin = new Margin(0);
        $margin2 = new Margin(123);

        $this->assertTrue($margin->isLessThan($margin2));
    }

    /**
    * @test
    */
    public function shouldNotBeLessThanOtherEqualMargin()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);
        $margin2 = new Margin($expectedValue);

        $this->assertFalse($margin->isLessThan($margin2));
    }

    /**
    * @test
    */
    public function shouldNotBeLessThanOtherMargin()
    {
        $margin = new Margin(123);
        $margin2 = new Margin(0);

        $this->assertFalse($margin->isLessThan($margin2));
    }

    /**
    * @test
    */
    public function shouldBeLessThanValue()
    {
        $value = 123;
        $margin = new Margin($value);

        $this->assertTrue($margin->isLessThanValue($value + 1));
    }

    /**
    * @test
    */
    public function shouldNotBeLessThanEqualValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);

        $this->assertFalse($margin->isLessThanValue($expectedValue));
    }

    /**
    * @test
    */
    public function shouldNotBeLessThanValue()
    {
        $expectedValue = 123;
        $margin = new Margin($expectedValue);

        $this->assertFalse($margin->isLessThanValue($expectedValue - 1));
    }

    /**
    * @test
    */
    public function shouldBeLessOrEqualThanMargin()
    {
        $margin = new Margin(100);
        $margin2 = new Margin(200);

        $this->assertTrue($margin->isLessOrEqualThan($margin2));
    }

    /**
    * @test
    */
    public function shouldBeLessOrEqualThanEqualMargin()
    {
        $value = 100;
        $margin = new Margin($value);
        $margin2 = new Margin($value);

        $this->assertTrue($margin->isLessOrEqualThan($margin2));
    }

    /**
    * @test
    */
    public function shouldNotBeLessOrEqualThanMargin()
    {
        $margin = new Margin(100);
        $margin2 = new Margin(0);

        $this->assertFalse($margin->isLessOrEqualThan($margin2));
    }

    /**
    * @test
    */
    public function shouldBeLessOrEqualThanValue()
    {
        $value = 100;
        $margin = new Margin($value - 1);

        $this->assertTrue($margin->isLessOrEqualThanValue($value));
    }

    /**
    * @test
    */
    public function shouldBeLessOrEqualThanEqualValue()
    {
        $value = 100;
        $margin = new Margin($value);

        $this->assertTrue($margin->isLessOrEqualThanValue($value));
    }

    /**
    * @test
    */
    public function shouldNotBeLessOrEqualThanValue()
    {
        $value = 100;
        $margin = new Margin($value + 1);

        $this->assertFalse($margin->isLessOrEqualThanValue($value));
    }

//
//    /*
//    * @test
//    */
//    public function RangeMargin_IsGreaterThan_TrueForNegativeInfinityMargin()
//    {
//        $nInfMargin = new NegativeInfinityMargin();
//        $margin = new Margin(0);
//
//        $this->assertTrue($margin->IsGreaterThan($nInfMargin));
//    }
//
//    /*
//    * @test
//    */
//    public function RangeMargin_IsGreaterThan_FalseForPositiveInfinityMargin()
//    {
//        $nInfMargin = new PositiveInfinityMargin();
//        $margin = new Margin(0);
//
//        $this->assertFalse($margin->IsGreaterThan($nInfMargin));
//    }
}
