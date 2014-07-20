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
        while (true) {
            $number++;
            $divisor = 2;
            while (0 !== $number % $divisor) {
                $divisor++;
            }
            if ($divisor === $number) {
                return $number;
            }
        }
    }
}
