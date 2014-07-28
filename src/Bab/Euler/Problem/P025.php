<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P025 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $prev = array(0);
        $current = array(1);
        $iteration = 1;
        do {
            $output->isVeryVerbose() && $output->writeln(sprintf('Fibonnacci #%d = %s', $iteration, implode('', $current)));

            $iteration++;
            $newCurrent = $this->getBigNumber($prev, $current, $output);
            $prev = $current;
            $current = $newCurrent;
        } while (count($current) < 1000);

        $output->isVerbose() && $output->writeln(sprintf('First Fibonnacci with 1000 digits #%d = %s', $iteration, implode('', $current)));

        return $iteration;
    }

    /**
     * getBigNumber
     *
     * @param array $prev
     * @param array $current
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function getBigNumber(array $prev, array $current, OutputInterface $output)
    {
        $output->isVeryVerbose() && $output->writeln(sprintf('Receive %s & %s', implode('', $prev), implode('', $current)));

        $next = array();
        $restraint = 0;

        $prev = array_pad($prev, - count($current), 0);

        for ($i = count($prev) - 1; $i >= 0; $i--) {
            $sum = $prev[$i] + $current[$i] + $restraint;
            $restraint = 0;
            $parts = str_split($sum);
            if (1 < count($parts)) {
                $restraint = $parts[0];
                $sum = $parts[1];
            }

            array_unshift($next, $sum);
        }

        if (0 !== $restraint) {
            array_unshift($next, $restraint);
        }

        $output->isVeryVerbose() && $output->writeln(sprintf('Result %s', implode('', $next)));

        return $next;
    }
}
