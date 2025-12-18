<?php

use AdventOfCode\Day04\Grid;

include '../../vendor/autoload.php';

$contents = array_map(
    fn(string $line) => str_split($line),
    explode(PHP_EOL, file_get_contents(__DIR__ . '/input.txt'))
);

$grid = Grid::fromData($contents);

echo "Total removable paper rolls: " . count($grid->getRemovableCells()) . PHP_EOL;