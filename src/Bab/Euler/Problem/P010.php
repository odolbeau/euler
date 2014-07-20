<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

/**
 * The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 *
 * Find the sum of all the primes below two million
 */
class P010 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $sum = 0;
        for ($i = 2; $i < 2000000; $i++) {
            if (Utils::isPrime($i)) {
                $sum += $i;
            }
        }

        return $sum;
    }
}
