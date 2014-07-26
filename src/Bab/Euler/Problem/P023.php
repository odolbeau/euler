<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P023 implements ProblemInterface
{
    const LIMIT = 28123;

    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $abundantNumbers = $this->getAbundantNumbers();

        $output->isVerbose() && $output->writeln(sprintf('%d abundant numbers found!', count($abundantNumbers)));

        $all = [];
        foreach ($abundantNumbers as $a) {
            $output->isVerbose() && $output->writeln(sprintf('Calculate sums for number %d', $a));
            foreach ($abundantNumbers as $b) {
                $sum = $a + $b;
                if ($sum > self::LIMIT) {
                    break;
                }
                if (!in_array($sum, $all)) {
                    $all[] = $sum;
                }
            }
        }

        $sum = 0;
        for ($i = 1; $i < self::LIMIT; $i++) {
            if (!in_array($i, $all)) {
                $sum += $i;
            }
        }

        return $sum;
    }

    /**
     * getAbundantNumbers
     *
     * @return array
     */
    protected function getAbundantNumbers()
    {
        $numbers = [];
        for ($i = 1; $i < self::LIMIT; $i++) {
            if ($this->isAbundant($i)) {
                $numbers[] = $i;
            }
        }

        return $numbers;
    }

    /**
     * isAbundant
     *
     * @param int $number
     *
     * @return bool
     */
    protected function isAbundant($number)
    {
        $divisors = Utils::getDivisors($number);

        return $number < array_sum($divisors) - $number;
    }
}
