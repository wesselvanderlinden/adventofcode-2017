<?php
namespace AdventOfCode\Day7;

use AdventOfCode\PuzzleInterface;

class Day7 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        return $this->resolveTree($input)['name'];
    }

    /**
     * @param string $input
     * @return array
     */
    protected function resolveTree(string $input): array
    {
        $programs = $this->parseInput($input);

        foreach ($programs as &$program) {
            if (!$program['children']) {
                continue;
            }

            $program['children'] = $this->resolveChildren($program['children'], $programs);
        }

        return array_shift($programs);
    }

    /**
     * @param string $input
     * @return array
     */
    protected function parseInput(string $input): array
    {
        $programs = [];
        $lines = explode(PHP_EOL, trim($input));

        foreach ($lines as $line) {
            preg_match('/(?P<name>[a-z]+) \((?P<weight>[0-9]+)\)( \-\> (?P<children>[a-z, ]+))?/', $line, $matches);

            $programs[$matches['name']] = [
                'name' => $matches['name'],
                'weight' => $matches['weight'],
                'children' => isset($matches['children']) ? array_map('trim', explode(',', $matches['children'])) : [],
            ];
        }

        return $programs;
    }

    /**
     * @param array $childNames
     * @param array $programs
     * @return array
     */
    protected function resolveChildren(array $childNames, array &$programs): array
    {
        $children = [];

        foreach ($childNames as $child) {
            if (is_string($child)) {
                $child = $programs[$child];
            }

            if ($child['children']) {
                $child['children'] = $this->resolveChildren($child['children'], $programs);
            }

            $children[] = $child;
            unset($programs[$child['name']]);
        }

        return $children;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        $tree = $this->resolveTree($input);

        try {
            $this->getWeight($tree);
        } catch (\Exception $exc) {
            return (int) $exc->getMessage();
        }


        throw new \RuntimeException('wtf');
    }

    /**
     * @param array $program
     * @return int|mixed
     * @throws \Exception
     */
    protected function getWeight(array $program)
    {
        $totalWeight = 0;
        $weightMap = [];

        foreach ($program['children'] as $child) {
            $weight = $this->getWeight($child);
            $totalWeight += $weight;

            if (!isset($weightMap[$weight])) {
                $weightMap[$weight] = [];
            }

            $weightMap[$weight][] = $child;
        }

        if (count($program['children']) > 1 && count($weightMap) > 1) {
            $wrongWeight = 0;
            $wrongProgram = null;
            $goodWeight = 0;

            foreach ($weightMap as $weight => $programs) {
                if (count($programs) === 1) {
                    $wrongWeight = $weight;
                    $wrongProgram = array_shift($programs);
                } else {
                    $goodWeight = $weight;
                }
            }

            $correction = $wrongWeight - $goodWeight;

            throw new \Exception($wrongProgram['weight'] - $correction);

        }

        return $totalWeight + $program['weight'];
    }
}