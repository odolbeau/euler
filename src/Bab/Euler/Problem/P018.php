<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P018 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $input = array(
            array(75),
            array(95, 64),
            array(17, 47, 82),
            array(18, 35, 87, 10),
            array(20, 04, 82, 47, 65),
            array(19, 01, 23, 75, 03, 34),
            array(88, 02, 77, 73, 07, 63, 67),
            array(99, 65, 04, 28, 06, 16, 70, 92),
            array(41, 41, 26, 56, 83, 40, 80, 70, 33),
            array(41, 48, 72, 33, 47, 32, 37, 16, 94, 29),
            array(53, 71, 44, 65, 25, 43, 91, 52, 97, 51, 14),
            array(70, 11, 33, 28, 77, 73, 17, 78, 39, 68, 17, 57),
            array(91, 71, 52, 38, 17, 14, 91, 43, 58, 50, 27, 29, 48),
            array(63, 66, 04, 68, 89, 53, 67, 30, 73, 16, 69, 87, 40, 31),
            array(04, 62, 98, 27, 23, 09, 70, 98, 73, 93, 38, 53, 60, 04, 23),
        );

        return $this->getTotal(0, 0, $input);
    }

    public function getTotal($x, $y, array $input)
    {
        $current = $input[$x][$y];

        // Last line ? Don't move !
        if ($x === count($input) - 2) {
            return $current + max($input[$x+1][$y], $input[$x+1][$y+1]);
        }

        return $current + max($this->getTotal($x + 1, $y, $input), $this->getTotal($x + 1, $y + 1, $input));
    }
}
