<?php

include '../../vendor/autoload.php';

use AdventOfCode\Day02\Range;

$contents = explode(',', explode(PHP_EOL, file_get_contents(__DIR__ . '/sample-input.txt'))[0]);

$foo = array_map(function ($part) {
    $range = new Range($part);

    return $range->getInvalids();
}, $contents);

$total = array_sum(array_merge(...$foo));

echo "Total invalid numbers: " . $total . PHP_EOL;