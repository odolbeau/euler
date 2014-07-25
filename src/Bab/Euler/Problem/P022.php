<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P022 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $names = file_get_contents(__DIR__ . '/../../../../resources/22-names.txt');
        $names = str_replace('"', '', $names);
        $names = explode(',', $names);
        sort($names);

        $score = 0;
        foreach ($names as $i => $name) {
            $letters = str_split($name);
            $sum = 0;
            foreach ($letters as $letter) {
                $sum += $this->getLetterValue($letter, $output);
            }
            $score += ($i + 1) * $sum;

            $output->isVerbose() && $output->writeln(sprintf('Score for name "%s": %d', $name, ($i + 1) * $sum));
        }

        return $score;
    }

    /**
     * getLetterValue
     *
     * @param string $letter
     *
     * @return int
     */
    public function getLetterValue($letter, OutputInterface $output)
    {
        $values = array(
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
            'f' => 6,
            'g' => 7,
            'h' => 8,
            'i' => 9,
            'j' => 10,
            'k' => 11,
            'l' => 12,
            'm' => 13,
            'n' => 14,
            'o' => 15,
            'p' => 16,
            'q' => 17,
            'r' => 18,
            's' => 19,
            't' => 20,
            'u' => 21,
            'v' => 22,
            'w' => 23,
            'x' => 24,
            'y' => 25,
            'z' => 26,
        );

        if (!array_key_exists(strtolower($letter), $values)) {
            $output->isVerbose() && $output->writeln(sprintf('Unknown letter "%s"', $letter));
            return 0;
        }

        return $values[strtolower($letter)];
    }
}
