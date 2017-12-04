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
        return $this->validatePasswords($input);
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        $callback = function ($word) {
            $chars = str_split($word);
            sort($chars);
            return implode($chars);
        };

        return $this->validatePasswords($input, $callback);
    }

    /**
     * @param string $input
     * @param callable|null $sanitizeWordCallback
     * @return int
     */
    protected function validatePasswords(string $input, callable $sanitizeWordCallback = null): int
    {
        $lines = explode(PHP_EOL, $input);
        $validPasswordCount = 0;

        foreach ($lines as $line) {
            $words = explode(' ', $line);

            if ($sanitizeWordCallback) {
                $words = array_map($sanitizeWordCallback, $words);
            }

            $uniqueWords = array_unique($words);

            if (count($uniqueWords) === count($words)) {
                $validPasswordCount++;
            }
        }

        return $validPasswordCount;
    }
}