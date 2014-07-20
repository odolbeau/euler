<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P016 implements ProblemInterface
{
    protected $routes = array();

    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        return array_sum(str_split(sprintf('%0.0f', pow(2, 1000))));
    }
}
