<?php
namespace AdventOfCodeTest\Day1;

use AdventOfCode\Day1\Day1;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    /**
     * @var Day1
     */
    protected $puzzle;

    protected function setUp()
    {
        parent::setUp();

        $this->puzzle = new Day1();
    }

    public function part1Provider()
    {
        return [
            [1122, 3],
            [1111, 4],
            [1234, 0],
            [91212129, 9]
        ];
    }

    /**
     * @dataProvider part1Provider
     * @param string $input
     * @param int $output
     */
    public function testPart1($input, $output)
    {
        $this->assertEquals($this->puzzle->solvePart1($input), $output);
    }

    public function part2Provider()
    {
        return [
            [1212, 6],
            [1221, 0],
            [123425, 4],
            [123123, 12],
            [12131415, 4],
        ];
    }

    /**
     * @dataProvider part2Provider
     * @param string $input
     * @param int $output
     */
    public function testPart2(string $input, int $output)
    {
        $this->assertEquals($this->puzzle->solvePart2($input), $output);
    }
}