<?php
namespace AdventOfCode\Day10;

use AdventOfCode\PuzzleInterface;

class Day10 implements PuzzleInterface
{
    /**
     * @var int
     */
    protected $listSize;

    /**
     * Day10 constructor.
     * @param int $listSize
     */
    public function __construct(int $listSize = 256)
    {
        $this->listSize = $listSize;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart1(string $input)
    {
        $lengths = array_map('intval', explode(',', $input));
        $list = $this->solve($lengths);

        return array_product(array_slice($list, 0, 2));
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function solvePart2(string $input)
    {
        $this->listSize = 256;

        $lengths = array_merge(array_map('ord', str_split($input)), [17, 31, 73, 47, 23]);
        $list = $this->solve($lengths, 64);
        $chunks = array_chunk($list, 16);
        $hashParts = [];

        foreach ($chunks as $chunk) {
            $hashParts[] = array_reduce($chunk, function ($carry, $length) {
                return $carry ^ $length;
            }, 0);
        }

        return array_reduce($hashParts, function ($carry, $item) {
            return $carry . str_pad(dechex($item), 2, '0', STR_PAD_LEFT);
        }, '');
    }

    /**
     * @param array $lengths
     * @param int $rounds
     * @return array
     */
    protected function solve(array $lengths, int $rounds = 1): array
    {
        $list = range(0, $this->listSize - 1);
        $currentPosition = 0;
        $skipSize = 0;

        for ($round = 0; $round < $rounds; $round++) {

            foreach ($lengths as $length) {
                if ($length > count($list)) {
                    // invalid length
                    continue;
                }

                $nextPosition = $currentPosition + $length;

                if ($nextPosition >= $this->listSize) {
                    $diff = $nextPosition - $this->listSize;
                    $slice = array_slice($list, $currentPosition, $length, true) + array_slice($list, 0, $diff, true);
                } else {
                    $slice = array_slice($list, $currentPosition, $length, true);
                }

                $reversed = array_combine(array_keys($slice), array_reverse($slice));
                $list = array_replace($list, $reversed);

                $currentPosition = ($nextPosition + $skipSize) % count($list);
                $skipSize++;
            }
        }

        return $list;
    }
}