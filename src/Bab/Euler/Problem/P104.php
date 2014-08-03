<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\BigNumbers;

class P104 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $prev = array(0);
        $current = array(1);
        $iteration = 1;
        $firstOK = false;
        $lastOK = false;
        $membersInArray = 9;
        do {
            $output->isVeryVerbose() && $output->writeln(sprintf('Fibonnacci #%d = %s', $iteration, implode('', $current)));

            $iteration++;
            $newCurrent = BigNumbers::addition($prev, $current, $membersInArray);
            $prev = $current;
            $current = $newCurrent;

            if (2 >= count($current)) {
                continue;
            }
            if (false === $lastOK = $this->containsPandigitalNumbers(end($current))) {
                continue;
            }

            $output->isVerbose() && $output->writeln(sprintf('Fibonnacci with pandigital numbers at the end #%d = %s', $iteration, implode('', $current)));

            $first = reset($current);
            if (9 > $count = strlen($first)) {
                $next = next($current);
                $first .= substr($next, 0, 9 - $count);
            }
            $firstOK = $this->containsPandigitalNumbers($first);
        } while (!$firstOK || !$lastOK);

        $output->isVerbose() && $output->writeln(sprintf('First Fibonnacci with pandigital numbers #%d = %s', $iteration, implode('', $current)));

        return $iteration;
    }

    /**
     * containsPandigitalNumbers
     *
     * @param string $numbers
     *
     * @return bool
     */
    protected function containsPandigitalNumbers($numbers)
    {
        if (9 > strlen($numbers)) {
            return false;
        }

        $numbers = str_split($numbers);

        return 9 === count(array_unique($numbers)) && !in_array(0, $numbers);
    }
}
