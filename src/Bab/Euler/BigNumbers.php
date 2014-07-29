<?php

namespace Bab\Euler;

class BigNumbers
{
    /**
     * addition
     *
     * @param array $prev
     * @param array $current
     *
     * @return array
     */
    public static function addition(array $prev, array $current)
    {
        $next = array();
        $restraint = 0;

        $prev = array_pad($prev, - count($current), 0);

        for ($i = count($prev) - 1; $i >= 0; $i--) {
            $sum = $prev[$i] + $current[$i] + $restraint;
            $restraint = 0;
            $parts = str_split($sum);
            if (1 < count($parts)) {
                $restraint = $parts[0];
                $sum = $parts[1];
            }

            array_unshift($next, $sum);
        }

        if (0 !== $restraint) {
            array_unshift($next, $restraint);
        }

        return $next;
    }
}
