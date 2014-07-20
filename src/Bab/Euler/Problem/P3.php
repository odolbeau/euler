<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * The prime factors of 13195 are 5, 7, 13 and 29.
 *
 * What is the largest prime factor of the number 600851475143 ?
 */
class P3 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {

        //600851475143

        $divisor = $this->getNextPrimeNumber(1, $output);
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

            $divisor = $this->getNextPrimeNumber($divisor, $output);
        }

        return end($primeFactors);
    }

    /**
     * getNextPrimeNumber
     *
     * @param int $number
     *
     * @return int
     */
    protected function getNextPrimeNumber($number, OutputInterface $output)
    {
        $output->isVeryVerbose() && $output->writeln(sprintf('Get prime number after %d.', $number));

        while (true) {
            $number++;
            $divisor = 2;
            while (0 !== $number % $divisor) {
                $divisor++;
            }
            if ($divisor === $number) {
                return $number;
            }
        }
    }

    /**
     * getPreviousPrimeNumber
     *
     * @param int $number
     *
     * @return int
     */
    protected function getPreviousPrimeNumber($number, OutputInterface $output)
    {
        $output->isVerbose() && $output->writeln(sprintf('Get prime number before %d.', $number));

        while (true) {
            $number--;
            $output->isVerbose() && $output->writeln(sprintf('Try with %d', $number));
            $divisor = 2;
            $quotient = $number % $divisor;
            while (0 !== $quotient) {
                $divisor++;
            }
            if ($divisor !== $number || $quotient < $divisor) {
                continue;
            }
        }

        return $number;
    }
}
