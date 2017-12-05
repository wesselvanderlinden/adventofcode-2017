<?php
namespace AdventOfCodeTest;

use AdventOfCode\PuzzleInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractPuzzleTest extends TestCase
{
    /**
     * @var PuzzleInterface
     */
    protected $puzzle;

    /**
     * @return PuzzleInterface
     */
    abstract protected function createPuzzle(): PuzzleInterface;

    /**
     * @return array
     */
    abstract public function part1Provider(): array;

    /**
     * @return array
     */
    abstract public function part2Provider(): array;

    protected function setUp()
    {
        parent::setUp();
        $this->puzzle = $this->createPuzzle();
    }

    /**
     * @dataProvider part1Provider
     * @param string $input
     * @param int $output
     */
    public function testPart1($input, $output)
    {
        $this->assertEquals($output, $this->puzzle->solvePart1($input));
    }

    /**
     * @dataProvider part2Provider
     * @param string $input
     * @param int $output
     */
    public function testPart2(string $input, int $output)
    {
        $this->assertEquals($output, $this->puzzle->solvePart2($input));
    }
}