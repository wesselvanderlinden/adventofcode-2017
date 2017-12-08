<?php
namespace AdventOfCode\Day8;

use AdventOfCode\PuzzleInterface;

class Day8 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        return $this->solve($input)[0];
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        return $this->solve($input)[1];
    }

    /**
     * @param string $input
     * @return array
     */
    protected function solve(string $input): array
    {
        $highestValueEvah = 0;
        $lines = explode(PHP_EOL, trim($input));
        $registers = [];

        foreach ($lines as $line) {
            preg_match('/(?P<register>[a-z]+) (?P<type>inc|dec) (?P<amount>-?[0-9]+) if (?P<leftHand>[a-z]+) (?P<operator>[\<\>\=\!]+) (?P<rightHand>-?[0-9]+)/', $line, $matches);

            if ($this->evaluateExpression($registers, $matches['leftHand'], $matches['operator'], $matches['rightHand'])) {
                $value = $this->resolveRegisterValue($registers, $matches['register']);

                switch ($matches['type']) {
                    case 'inc':
                        $value += $matches['amount'];
                        break;

                    case 'dec':
                        $value -= $matches['amount'];
                        break;

                    default:
                        throw new \RuntimeException('Invalid type: ' . $matches['type']);
                }

                $highestValueEvah = max($value, $highestValueEvah);
                $registers[$matches['register']] = $value;
            }
        }

        return[max($registers), $highestValueEvah];
    }

    /**
     * @param array $registers
     * @param string $name
     * @return int
     */
    protected function resolveRegisterValue(&$registers, string $name): int
    {
        if (!isset($registers[$name])) {
            $registers[$name] = 0;
        }

        return $registers[$name];
    }

    /**
     * @param array $registers
     * @param string $leftHand
     * @param string $operator
     * @param string $rightHand
     * @return bool
     */
    protected function evaluateExpression(array &$registers, string $leftHand, string $operator, string $rightHand): bool
    {
        $left = $this->resolveRegisterValue($registers, $leftHand);
        $right = intval($rightHand);

        switch ($operator) {
            case '>':
                return $left > $right;

            case '<':
                return $left < $right;

            case '>=':
                return $left >= $right;

            case '<=':
                return $left <= $right;

            case '==':
                return $left == $right;

            case '!=':
                return $left != $right;

            default:
                throw new \RuntimeException('Invalid expression');
        }
    }
}