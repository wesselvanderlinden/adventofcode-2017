<?php
namespace AdventOfCode\Day4;

use AdventOfCode\PuzzleInterface;

class Day4 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        $lines = explode(PHP_EOL, $input);
        $validPasswordCount = 0;

        foreach ($lines as $line) {
            $words = explode(' ', $line);
            $uniqueWords = array_unique($words);

            if (count($uniqueWords) === count($words)) {
                $validPasswordCount++;
            }
        }

        return $validPasswordCount;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        return false;
    }
}