<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P021 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $results = array();
        for ($i = 1; $i < 10000; $i++) {
            $divisors = Utils::getDivisors($i);
            $sum = array_sum($divisors) - $i;
            $results[$i] = $sum;
        }

        $sum = 0;
        foreach ($results as $a => $b) {
            if (isset($results[$b]) && $a < $b && $results[$b] === $a) {
                $sum += $a + $b;
            }
        }

        return $sum;
    }
}
