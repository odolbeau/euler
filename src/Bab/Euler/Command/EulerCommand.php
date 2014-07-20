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

        $class = sprintf('Bab\Euler\Problem\P%d', (int) $problem);
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
            $duration
        ));
    }
}
