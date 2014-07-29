<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\BigNumbers;

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
            $newCurrent = BigNumbers::addition($prev, $current);
            $prev = $current;
            $current = $newCurrent;
        } while (count($current) < 1000);

        $output->isVerbose() && $output->writeln(sprintf('First Fibonnacci with 1000 digits #%d = %s', $iteration, implode('', $current)));

        return $iteration;
    }
}
