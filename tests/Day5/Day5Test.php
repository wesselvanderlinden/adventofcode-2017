<?php
namespace AdventOfCodeTest\Day5;

use AdventOfCode\Day5\Day5;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day5Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day5();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ["0\n3\n0\n1\n-3", 5]
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
            ["0\n3\n0\n1\n-3", 10]
        ];
    }
}