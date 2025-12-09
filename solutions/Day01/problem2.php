<?php

include '../../vendor/autoload.php';

use AdventOfCode\Day01\Dial;

$dial = new Dial();
$contents = explode(PHP_EOL, file_get_contents(__DIR__ . '/input.txt'));
foreach ($contents as $content) {
    $dial->process($content);
}

$count = $dial->zeroPasses();

echo "The dial crossed over 0 a total of: " . $count . " times." . PHP_EOL;
