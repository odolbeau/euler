<?php

namespace Bab\Euler;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we
 * get 3, 5, 6 and 9. The sum of these multiples is 23.
 *
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */
class P1 extends Command
{
    protected function configure()
    {
        $this
            ->setName('euler:1')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $multiples = [];

        $i = 1;
        $product = 0;
        while ($product < 1000) {
            $multiples[] = $product;
            $product = $i * 3;
            $i++;
        }

        $output->writeln(sprintf('Found %d multiples of 3 below 1000', count($multiples)));

        $i = 1;
        $product = 0;
        while ($product < 1000) {
            $multiples[] = $product;
            $product = $i * 5;
            $i++;
        }

        $output->writeln(sprintf('Found %d multiples of 3 and 5 below 1000', count($multiples)));

        $multiples = array_unique($multiples);

        $sum = array_sum($multiples);

        $output->writeln(sprintf('<info>Sum: %d</info>', $sum));
    }
}
