<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P029 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $combinations = $this->getAllCombinations(2, 100);

        return count(array_unique($combinations));
    }

    /**
     * getAllCombinations
     *
     * @param int $start
     * @param int $limit
     *
     * @return array
     */
    protected function getAllCombinations($start, $limit)
    {
        $combinations = [];
        for ($i = $start; $i <= $limit; $i++) {
            for ($j = $start; $j <= $limit; $j++) {
                $combinations[] = pow($i, $j);
            }
        }

        return $combinations;
    }
}
