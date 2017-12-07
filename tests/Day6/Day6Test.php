<?php
namespace AdventOfCodeTest\Day4;

use AdventOfCode\Day6\Day6;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day6Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day6();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ['0    2    7    0', 5]
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
        ];
    }
}