<?php

namespace Bab\Euler\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class EulerCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('euler')
            ->setDescription('Run the asked euler problem')
            ->addArgument('problem', InputArgument::REQUIRED, 'Which problem?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $problem = $input->getArgument('problem');

        $class = sprintf('Bab\Euler\Problem\P%s', str_pad($problem, 3, '0', STR_PAD_LEFT));
        if (!class_exists($class)) {
            $output->writeln(sprintf('<error>No solution for problem #%d</error>', (int) $problem));

            exit(1);
        }

        $start = microtime(true);
        $solver = new $class;
        $solution = $solver->resolve($output);

        $duration = microtime(true) - $start;

        $output->writeln(sprintf(
            '<comment>Solution for problem <info>#%d</info>: <info>%s</info>. Found in <info>%s</info></comment>',
            $problem,
            $solution,
            $this->durationToString($duration)
        ));
    }

    /**
     * durationToString
     *
     * @param int $duration
     *
     * @return string
     */
    protected function durationToString($duration)
    {
        $seconds = $duration % 60;
        $duration = floor($duration / 60);
        $minutes = $duration % 60;
        $duration = floor($duration / 60);
        $hours = $duration;

        if (0 == $hours && 0 == $minutes && 0 == $seconds) {
            return 'less than a second';
        }

        if (0 == $hours && 0 == $minutes) {
            return sprintf('%d seconds', $seconds);
        }

        if (0 == $hours) {
            return sprintf('%d minutes and %d seconds', $minutes, $seconds);
        }

        return sprintf(
            '%s hours %s minutes %s seconds',
            $hours,
            $minutes,
            $seconds
        );
    }
}
