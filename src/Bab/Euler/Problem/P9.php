<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

/**
 * A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
 *
 * a2 + b2 = c2
 *
 * For example, 32 + 42 = 9 + 16 = 25 = 52.
 *
 * There exists exactly one Pythagorean triplet for which a + b + c = 1000.
 * Find the product abc.
 */
class P9 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $max = 1000;

        for ($a = 1; $a < $max; $a++) {
            for ($b = 1; $b < $max; $b++) {
                $sum = pow($a, 2) + pow($b, 2);
                $c = sqrt($sum);
                if ((int) $c == $c) {
                    $output->isVerbose() && $output->writeln(sprintf('<info>Pythagore found: %d² + %d² = %d² (Sum : %d)</info>', $a, $b, $c, $a + $b + $c));
                }

                if (1000 == $a + $b + $c) {
                    return $a * $b * $c;
                }
            }
        }

        throw new \Exception('No solution found. :(');
    }
}
