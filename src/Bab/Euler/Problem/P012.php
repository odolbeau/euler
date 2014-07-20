<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P012 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $i = 1;
        $triangle = 0;
        do {
            $triangle += $i;
            $i++;
        } while (500 > count(Utils::getDivisors($triangle)));

        return $triangle;
    }
}
