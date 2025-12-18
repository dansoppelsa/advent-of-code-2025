<?php

use AdventOfCode\Day05\IngredientList;

include '../../vendor/autoload.php';

$list = IngredientList::fromData(file_get_contents(__DIR__ . '/input.txt'));

echo 'Fresh ingredients: ' . count($list->getFresh()) . PHP_EOL;