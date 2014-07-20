<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * 2520 is the smallest number that can be divided by each of the numbers from
 * 1 to 10 without any remainder.
 *
 * What is the smallest positive number that is evenly divisible by all of the
 * numbers from 1 to 20?
 */
class P005 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $number = 2;
        while (true) {
            for ($i = 2; $i <= 20; $i++) {
                if (0 !== $number % $i) {
                    $number++;

                    continue 2;
                }
            }

            return $number;
        }
    }
}
