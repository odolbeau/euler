<?php

namespace Bab\Euler\Problem;

use Symfony\Component\Console\Output\OutputInterface;
use Bab\Euler\Utils;

class P019 implements ProblemInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(OutputInterface $output)
    {
        $firstDay = 0;
        $month = 1;
        $year = 1900;

        // First, move to 01/1901
        do {
            $days = $this->getMonthNbDays($month, $year);
            $firstDay = $this->getDay($firstDay, $days);

            $output->isVeryVerbose() && $output->writeln(sprintf('Check month #%d of %d: %d days. Next month first day: #%d', $month, $year, $days, $firstDay));

            $month = $month + 1;
            if (13 === $month) {
                $month = 1;
                $year += 1;
            }
        } while ($month !== 1 || $year !== 1901);

        // Now calc !
        $sundays = 0;
        do {
            $days = $this->getMonthNbDays($month, $year);
            $firstDay = $this->getDay($firstDay, $days);

            $output->isVeryVerbose() && $output->writeln(sprintf('Check month #%d of %d: %d days. Next month first day: #%d', $month, $year, $days, $firstDay));

            $month = $month + 1;
            if (13 === $month) {
                $month = 1;
                $year += 1;
            }



            if (6 === $firstDay) {
                $output->isVerbose() && $output->writeln(sprintf('First day is a sunday in %d / %d', $month, $year));
                $sundays++;
            }
        } while ($month !== 12 || $year !== 2000);

        return $sundays;
    }

    /**
     * getMonthNbDays
     *
     * @param int $month
     * @param int $year
     *
     * @return int
     */
    public function getMonthNbDays($month, $year)
    {

        if ($month === 2) {
            if (0 === $year % 4 && (0 !== $year % 100 || 0 === $year % 400)) {
                return 29;
            }

            return 28;
        }

        if (in_array($month, array(1, 3, 5, 7, 8, 10, 12))) {
            return 31;
        }

        return 30;
    }

    /**
     * getDay
     *
     * @param int $start
     * @param int $days
     *
     * @return int
     */
    public function getDay($start, $days)
    {
        return ($start + $days) % 7;
    }
}
