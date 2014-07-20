<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;

interface ProblemInterface
{
    /**
     * resolve
     *
     * @param OutputInterface $output
     *
     * @return mixed
     */
    public function resolve(OutputInterface $output);
}
