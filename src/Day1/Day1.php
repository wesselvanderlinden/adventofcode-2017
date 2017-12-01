<?php
namespace AdventOfCode\Day1;

use AdventOfCode\PuzzleInterface;

class Day1 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        return $this->solve($input, 1);
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        return $this->solve($input, strlen($input) / 2);
    }

    /**
     * @param string $input
     * @param int $step
     * @return int
     */
    protected function solve(string $input, int $step): int
    {
        $answer = 0;

        for ($i = 0; $i < strlen($input); $i++) {
            $current = $input[$i];
            $next = $input[($i + $step) % strlen($input)];

            if ($current === $next) {
                $answer += $current;
            }
        }

        return $answer;
    }
}