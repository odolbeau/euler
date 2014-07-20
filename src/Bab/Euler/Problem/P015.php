<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P015 implements ProblemInterface
{
    protected $routes = array();

    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        return $this->countRoutes(0, 0, 20, $output);
    }

    /**
     * countRoutes
     *
     * @param int $x
     * @param int $y
     * @param int $size
     *
     * @return int
     */
    public function countRoutes($x, $y, $size, OutputInterface $output)
    {
        $key = sprintf('%d-%d', $x, $y);
        if (array_key_exists($key, $this->routes)) {
            return $this->routes[$key];
        }

        $output->isVerbose() && $output->writeln(sprintf('Calculate routes for coordinates [%d, %d]', $x, $y));

        $positions = $this->getNextPositions($x, $y, $size);

        if (0 === count($positions)) {
            $this->routes[$key] = 1;

            return 1;
        }

        $count = 0;
        foreach ($positions as $position) {
            $count += $this->countRoutes($position[0], $position[1], $size, $output);
        }

        $this->routes[$key] = $count;

        return $count;
    }

    /**
     * getNextPositions
     *
     * @param int $x
     * @param int $y
     * @param int $size
     *
     * @return array
     */
    protected function getNextPositions($x, $y, $size)
    {
        $positions = [];

        if ($x + 1 < $size + 1) {
            $positions[] = array($x + 1, $y);
        }

        if ($y + 1 < $size + 1) {
            $positions[] = array($x, $y + 1);
        }

        return $positions;
    }
}
