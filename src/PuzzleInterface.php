<?php
namespace AdventOfCode;

interface PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input);

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input);
}