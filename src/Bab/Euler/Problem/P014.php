<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P014 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $biggestSequence = [0, 0];
        for ($i = 1; $i < 1000000; $i++) {
            $sequence = count($this->getCollatzSequence($i));
            if ($sequence > $biggestSequence[1]) {
                $biggestSequence = [$i, $sequence];
            }
        }

        return $biggestSequence[0];
    }

    protected function getCollatzSequence($number)
    {
        $sequence = [$number];
        while ($number !== 1) {
            if (0 === $number % 2) {
                $number = $number / 2;
            } else {
                $number = $number * 3 +1;
            }
            $sequence[] = $number;
        }

        return $sequence;
    }
}
