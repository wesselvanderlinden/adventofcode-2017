<?php
namespace AdventOfCodeTest\Day10;

use AdventOfCode\Day10\Day10;
use AdventOfCode\PuzzleInterface;
use AdventOfCodeTest\AbstractPuzzleTest;

class Day10Test extends AbstractPuzzleTest
{
    /**
     * @return PuzzleInterface
     */
    protected function createPuzzle(): PuzzleInterface
    {
        return new Day10(5);
    }

    /**
     * @return array
     */
    public function part1Provider(): array
    {
        return [
            ['3,4,1,5', 12]
        ];
    }

    /**
     * @return array
     */
    public function part2Provider(): array
    {
        return [
            ['AoC 2017', '33efeb34ea91902bb2f59c9920caa6cd'],
            ['1,2,3', '3efbe78a8d82f29979031a4aa0b16a9d'],
            ['1,2,4', '63960835bcdc130f0b66d7ff4f6a5a8e']
        ];
    }

    /**
     * @dataProvider part2Provider
     * @param string $input
     * @param $output
     */
    public function testPart2(string $input, $output)
    {
        $this->puzzle = new Day10();

        parent::testPart2($input, $output);
    }
}