<?php
namespace AdventOfCode\Day6;

use AdventOfCode\PuzzleInterface;

class Day6 implements PuzzleInterface
{
    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        $banks = array_map('intval', preg_split('/\s+/', $input));
        $configurations = [];
        $count = 0;

        do {
            $banks = $this->redistribute($banks, $this->getIndexWithMostBlocks($banks));
            $config = implode(',', $banks);
            $count++;

            if (in_array($config, $configurations)) {
                break;
            }

            $configurations[] = $config;
        } while (true);

        return $count;
    }

    /**
     * @param array $banks
     * @return int
     */
    protected function getIndexWithMostBlocks(array $banks): int
    {
        $index = 0;

        for ($i = 0; $i < count($banks); $i++) {
            if ($banks[$i] > $banks[$index]) {
                $index = $i;
            }
        }

        return $index;
    }

    /**
     * @param array $banks
     * @param $index
     * @return array
     */
    protected function redistribute(array $banks, $index): array
    {
        $blockCount = $banks[$index];
        $banks[$index] = 0;

        for ($i = 0; $i < $blockCount; $i++) {
            $index++;

            if ($index >= count($banks)) {
                $index = 0;
            }

            $banks[$index]++;
        }

        return $banks;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        // TODO: Implement solvePart2() method.
    }
}