<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

/**
 * The prime factors of 13195 are 5, 7, 13 and 29.
 *
 * What is the largest prime factor of the number 600851475143 ?
 */
class P003 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $divisor = Utils::getNextPrimeNumber(1);
        $primeFactors = [];
        while (true) {
            $quotient = 600851475143 / $divisor;
            $output->isVeryVerbose() && $output->writeln(sprintf('Divisor: %d. Result: %s', $divisor, $quotient));

            if (is_int($quotient)) {
                $primeFactors[] = $divisor;
                $output->isVerbose() && $output->writeln(sprintf('New prime factor found: %d.', $divisor));
            }

            if ($quotient < $divisor) {
                break;
            }

            $divisor = Utils::getNextPrimeNumber($divisor);
        }

        return end($primeFactors);
    }
}
