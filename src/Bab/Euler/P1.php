<?php

namespace Bab\Euler;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

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
    }
}
