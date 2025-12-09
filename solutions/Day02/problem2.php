<?php

include '../../vendor/autoload.php';

use AdventOfCode\Day02\Range;
use AdventOfCode\Day02\EnhancedChecker;

$contents = explode(',', explode(PHP_EOL, file_get_contents(__DIR__ . '/input.txt'))[0]);

$foo = array_map(function ($part) {
    $range = (new Range($part))->setChecker(new EnhancedChecker());

    return $range->getInvalids();
}, $contents);

$total = array_sum(array_merge(...$foo));

echo "Total invalid numbers: " . $total . PHP_EOL;