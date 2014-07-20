<?php

namespace Bab\Euler;

class Utils
{
    /**
     * getNextPrimeNumber
     *
     * @param int $number
     *
     * @return int
     */
    public static function getNextPrimeNumber($number)
    {
        while (!self::isPrime(++$number)) {
        }

        return $number;
    }

    /**
     * isPrime
     *
     * @param int $number
     *
     * @return boolean
     */
    public static function isPrime($number)
    {
        if ($number < 2) {
            return false;
        }

        if (2 === $number) {
            return true;
        }

        if (0 === $number % 2) {
            return false;
        }

        for ($divisor = 3; $divisor <= ceil(sqrt($number)); $divisor += 2) {
            if (0 === $number % $divisor) {
                return false;
            }
        }

        return true;
    }
}
