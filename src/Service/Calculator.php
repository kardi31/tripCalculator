<?php
declare(strict_types=1);

namespace App\Service;

class Calculator
{
    public static function add(float $number1, float $number2): float
    {
        return $number1 + $number2;
    }

    public static function sub(float $number1, float $number2): float
    {
        return $number1 - $number2;
    }

    public static function mul(float $number1, float $number2): float
    {
        return $number1 * $number2;
    }

    /**
     * Returns the integer quotient of the division of dividend by divisor.
     *
     * @param float $number1
     * @param float $number2
     *
     * @throws \DivisionByZeroError
     *
     * @return float
     */
    public static function div(float $number1, float $number2): ?float
    {
        return floatval(bcdiv(strval($number1), strval($number2)));
    }
}
