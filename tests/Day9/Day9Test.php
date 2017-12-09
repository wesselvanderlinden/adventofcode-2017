<?php
namespace AdventOfCodeTest\Day9;

use AdventOfCode\Day9\Day9;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day9Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day9();
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ['{},', 1],
            ['{{{}}},', 6],
            ['{{},{}},', 5],
            ['{{{},{},{{}}}},', 16],
            ['{<a>,<a>,<a>,<a>},', 1],
            ['{{<ab>},{<ab>},{<ab>},{<ab>}},', 9],
            ['{{<!!>},{<!!>},{<!!>},{<!!>}},', 9],
            ['{{<a!>},{<a!>},{<a!>},{<ab>}},', 3],
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
            ['{<>}', 0],
            ['{<random characters>}', 17],
            ['{<<<<>,}', 3],
            ['{<{!>}>,}', 2],
            ['{<!!>,}', 0],
            ['{<!!!>>,}', 0],
            ['{<{o"i!a,<{i<a>,}', 10],
        ];
    }
}