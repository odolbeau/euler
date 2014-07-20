<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we
 * get 3, 5, 6 and 9. The sum of these multiples is 23.
 *
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */
class P001 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $multiples = [];

        $i = 1;
        $product = 0;
        while ($product < 1000) {
            $multiples[] = $product;
            $product = $i * 3;
            $i++;
        }

        $output->isVerbose() && $output->writeln(sprintf('Found %d multiples of 3 below 1000', count($multiples)));

        $i = 1;
        $product = 0;
        while ($product < 1000) {
            $multiples[] = $product;
            $product = $i * 5;
            $i++;
        }

        $output->isVerbose() && $output->writeln(sprintf('Found %d multiples of 3 and 5 below 1000', count($multiples)));

        $multiples = array_unique($multiples);

        return array_sum($multiples);
    }
}
