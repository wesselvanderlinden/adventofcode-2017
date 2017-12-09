<?php
namespace AdventOfCode\Day9;

use AdventOfCode\Day9\Interpreter\Lexer;
use AdventOfCode\Day9\Interpreter\Node\Group;
use AdventOfCode\Day9\Interpreter\Parser;
use AdventOfCode\PuzzleInterface;

class Day9 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return int
     * @throws \Exception
     */
    public function solvePart1(string $input)
    {
        $lexer = new Lexer($input);
        $parser = new Parser($lexer);
        $group = $parser->parse();

        return $this->getScore($group);
    }

    /**
     * @param Group $group
     * @param int $parentScore
     * @return int
     */
    protected function getScore(Group $group, int $parentScore = 0): int
    {
        $score = $parentScore + 1;
        $total = $score;

        foreach ($group->getChildren() as $child) {
            $total += $this->getScore($child, $score);
        }

        return $total;
    }

    /**
     * @param string $input
     * @return int
     * @throws \Exception
     */
    public function solvePart2(string $input)
    {
        $lexer = new Lexer($input);
        $parser = new Parser($lexer);
        $group = $parser->parse();

        return $this->getGarbageCharCount($group);
    }

    /**
     * @param Group $group
     * @return int
     */
    protected function getGarbageCharCount(Group $group): int
    {
        $count = 0;

        if ($group->getGarbage()) {
            $count += strlen($group->getGarbage()->getValue());
        }

        foreach ($group->getChildren() as $child) {
            $count += $this->getGarbageCharCount($child);
        }

        return $count;
    }
}