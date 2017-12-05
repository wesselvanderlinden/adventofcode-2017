#!/usr/bin/php
<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

if (!isset($argv[1])) {
    die('You must specify a day number' . PHP_EOL);
}

$dayNumber = intval($argv[1]);

$suffix = 'Day' . $dayNumber;
$inputFile = sprintf('%s/src/%s/input.txt', dirname(__DIR__), $suffix);
$fqcn = sprintf('AdventOfCode\\%1$s\\%1$s', $suffix);

if (file_exists($inputFile) && class_exists($fqcn)) {
    $input = trim(file_get_contents($inputFile));
    $instance = new $fqcn();

    if (!$instance instanceof \AdventOfCode\PuzzleInterface) {
        die(sprintf("Class '%s' is not an instance of '%s'\n", $fqcn, \AdventOfCode\PuzzleInterface::class));
    }

    echo "Day " . $dayNumber . PHP_EOL;

    foreach ([1,2] as $part) {
        $start = microtime(true);
        $result = call_user_func([$instance, 'solvePart' . $part], $input);
        $end = microtime(true);

        printf("Part %u (solved in %.2f ms): %s\n", $part, ($end - $start) * 1000, $result);
    }
} else {
    die('Something went wrong. Go fix...' . PHP_EOL);
}