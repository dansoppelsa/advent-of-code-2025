<?php

include '../../vendor/autoload.php';

use AdventOfCode\Day01\Dial;

$dial = new Dial();
$contents = explode(PHP_EOL, file_get_contents(__DIR__ . '/input.txt'));
foreach ($contents as $content) {
    $dial->process($content);
}

echo "The dial landed on 0 a total of: " . count(array_filter($dial->getPositions(), fn(array $pos) => $pos['after'] === 0)) . " times." . PHP_EOL;
