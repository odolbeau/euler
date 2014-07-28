<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P024 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $permutations = $this->getAllPermutations(array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9), $output);
        sort($permutations);

        return $permutations[999999];
    }

    /**
     * getAllPermutations
     *
     * @param array $items
     * @param OutputInterface $output
     *
     * @return array
     */
    protected function getAllPermutations(array $items, OutputInterface $output)
    {
        $output->isVerbose() && $output->writeln(sprintf('Call getAllPermutations with items [%s]', implode(', ', $items)));

        if (1 === count($items)) {
            $output->isVerbose() && $output->writeln(sprintf('One element left: %s', $items[0]));

            return array($items[0]);
        }

        for ($i = 0; $i < count($items); $i++) {
            $newItems = $items;
            unset($newItems[$i]);
            $output->isVerbose() && $output->writeln(
                sprintf(
                    'items: [%s]. Current: %d. newItems: [%s]',
                    implode(', ', $items),
                    $i,
                    implode(', ', $newItems)
                )
            );
            $perms = $this->getAllPermutations(array_values($newItems), $output);
            foreach ($perms as $perm) {
                $permutations[] = $items[$i] . $perm;
            }
        }

        return $permutations;
    }
}
