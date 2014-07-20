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
class P007 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $primeNumber = 1;
        for ($i = 1; $i <= 10001; $i++) {
            $primeNumber = Utils::getNextPrimeNumber($primeNumber);
        }

        return $primeNumber;
    }
}
