<?php

include '../../vendor/autoload.php';

use AdventOfCode\Day03\JoltageReader;

$contents = explode(PHP_EOL, file_get_contents(__DIR__ . '/input.txt'));

$reader = new JoltageReader();

$joltages = array_map(fn(string $bank) => $reader->getLargeJoltage2($bank), $contents);

echo "The total joltage is: " . array_sum($joltages) . PHP_EOL;