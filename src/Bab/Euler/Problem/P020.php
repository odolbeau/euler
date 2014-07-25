<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P020 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $output->writeln('<error>The factorial of 100 is too big for php. :(</error>');
        exit(1);
        $factorial = $this->getFactorial(100);

        return array_sum(str_split(sprintf('%0.0f', $factorial)));
    }

    public function getFactorial($number)
    {
        if (1 === $number) {
            return 1;
        }

        return $number * $this->getFactorial($number - 1);
    }
}
