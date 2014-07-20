<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * The sum of the squares of the first ten natural numbers is,
 *
 * 12 + 22 + ... + 102 = 385
 *
 * The square of the sum of the first ten natural numbers is,
 *
 * (1 + 2 + ... + 10)2 = 552 = 3025
 *
 * Hence the difference between the sum of the squares of the first ten natural
 * numbers and the square of the sum is 3025 − 385 = 2640.
 *
 * Find the difference between the sum of the squares of the first one hundred
 * natural numbers and the square of the sum.
 */
class P6 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $sumOfSquare = 0;
        $sum = 0;
        for ($i = 1; $i <= 100; $i++) {
            $sumOfSquare += pow($i, 2);
            $sum += $i;
        }

        $output->isVerbose() && $output->writeln(sprintf('<info>Sum of square: %d</info>', $sumOfSquare));

        $squareOfSum = pow($sum, 2);

        $output->isVerbose() && $output->writeln(sprintf('<info>Square of sum: %d</info>', $squareOfSum));

        return $squareOfSum - $sumOfSquare;
    }
}
