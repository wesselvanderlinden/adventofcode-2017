<?php
namespace AdventOfCodeTest\Day4;

use AdventOfCode\Day8\Day8;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day8Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day8();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ["
                b inc 5 if a > 1
                a inc 1 if b < 5
                c dec -10 if a >= 1
                c inc -20 if c == 10
            ", 1]
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
            ["
                b inc 5 if a > 1
                a inc 1 if b < 5
                c dec -10 if a >= 1
                c inc -20 if c == 10
            ", 10]
        ];
    }
}