<?php

namespace AdventOfCode\Day2;

use AdventOfCode\PuzzleInterface;

class Day2 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        $spreadsheet = $this->parseSpreadsheet($input);
        $checksum = 0;

        foreach ($spreadsheet as $row) {
            $checksum += max($row) - min($row);
        }

        return $checksum;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        $spreadsheet = $this->parseSpreadsheet($input);
        $checksum = 0;

        foreach ($spreadsheet as $row) {
            $checksum += $this->calculateSumOfEvenlyDivisibleValues($row);
        }

        return $checksum;
    }

    /**
     * @param array $row
     * @return int
     * @throws \Exception
     */
    protected function calculateSumOfEvenlyDivisibleValues(array $row): int
    {
        foreach ($row as $a) {
            foreach ($row as $b) {
                if ($a !== $b && $a % $b === 0) {
                    return max($a, $b) / min($a, $b);
                }
            }
        }

        throw new \Exception('No evenly divisible values found in row');
    }

    /**
     * @param string $input
     * @return array
     */
    protected function parseSpreadsheet(string $input): array
    {
        $rows = explode(PHP_EOL, $input);
        $result = [];

        foreach ($rows as $row) {
            $result[] = array_map('intval', preg_split('/\s/', $row));
        }

        return $result;
    }
}