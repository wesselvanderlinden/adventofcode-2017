<?php
namespace AdventOfCodeTest\Day4;

use AdventOfCode\Day4\Day4;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day4Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day4();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ['aa bb cc dd ee', 1],
            ['aa bb cc dd aa', 0],
            ['aa bb cc dd aaa', 1],
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [];
    }
}