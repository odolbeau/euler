<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * A palindromic number reads the same both ways. The largest palindrome made
 * from the product of two 2-digit numbers is 9009 = 91 × 99.
 *
 * Find the largest palindrome made from the product of two 3-digit numbers.
 */
class P4 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $palindrome = [];
        for ($n1 = 999; $n1 >= 100; $n1--) {
            for ($n2 = 999; $n2 >= 100; $n2--) {
                $product = $n1 * $n2;
                if ($this->isPalindrome((string) $product)) {
                    $output->isVerbose() && $output->writeln(sprintf('<info>New palindrome: %d</info>', $product));
                    $palindromes[] = $product;
                }
            }
        }

        sort($palindromes);

        return end($palindromes);
    }

    /**
     * isPalindrome
     *
     * @param mixed $str
     *
     * @return bool
     */
    protected function isPalindrome($str)
    {
        if (2 > strlen($str)) {
            return true;
        }

        if (substr($str, 0, 1) === substr($str, strlen($str) - 1, 1)) {
            return $this->isPalindrome(substr($str, 1, strlen($str) -2));
        }

        return false;
    }
}
