<?php
namespace AdventOfCode\Day5;

use AdventOfCode\PuzzleInterface;

class Day5 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        return $this->solve($input, function ($offset) {
            return 1;
        });
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        return $this->solve($input, function ($offset) {
            return $offset >= 3 ? -1 : 1;
        });
    }

    /**
     * @param string $input
     * @param callable $offsetCalculateUnit
     * @return int
     */
    protected function solve(string $input, callable $offsetCalculateUnit)
    {
        $stepCount = 0;
        $list = array_map('intval', explode(PHP_EOL, $input));

        for ($i = 0; $i < count($list); $stepCount++) {
            $offset = $list[$i];
            $list[$i] += $offsetCalculateUnit($offset);
            $i += $offset;
        }

        return $stepCount;
    }
}