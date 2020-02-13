<?php

namespace App\Tests\Service;

use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function testAddReturnsCorrectResult()
    {
        $result = $this->calculator->add(5.3, 3.6);
        $this->assertEquals(8.9, $result);
    }

    public function testSubReturnsCorrectResult()
    {
        $result = $this->calculator->sub(5.5, 3.1);
        $this->assertEquals(2.4, $result);
    }

    public function testMulReturnsCorrectResult()
    {
        $result = $this->calculator->mul(5.7, 3.3);
        $this->assertEquals(18.81, $result);
    }

    public function testDivReturnsCorrectResult()
    {
        $result = $this->calculator->div(7.5, 1.5);
        $this->assertEquals(5, $result);
    }
}
