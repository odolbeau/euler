<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

/**
 * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see
 * that the 6th prime is 13.
 *
 * What is the 10 001st prime number?
 */
class P7 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $i = 1;
        $primeNumber = 1;
        while ($i <= 10001) {
            $primeNumber = Utils::getNextPrimeNumber($primeNumber);
            $i++;
        }

        return $primeNumber;
    }
}
