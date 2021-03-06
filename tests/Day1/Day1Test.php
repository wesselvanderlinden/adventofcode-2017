<?php
namespace AdventOfCodeTest\Day1;

use AdventOfCode\Day1\Day1;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day1Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day1();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            [1122, 3],
            [1111, 4],
            [1234, 0],
            [91212129, 9]
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
            [1212, 6],
            [1221, 0],
            [123425, 4],
            [123123, 12],
            [12131415, 4],
        ];
    }
}