<?php
namespace AdventOfCodeTest\Day2;

use AdventOfCode\Day2\Day2;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day2Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day2();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ['5 1 9 5', 8],
            ['7 5 3', 4],
            ['2 4 6 8', 6],
            ["5 1 9 5\n7 5 3\n2 4 6 8", 18]
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
            ['5 9 2 8', 4],
            ['9 4 7 3', 3],
            ['3 8 6 5', 2],
            ["5 9 2 8\n9 4 7 3\n3 8 6 5", 9]
        ];
    }
}