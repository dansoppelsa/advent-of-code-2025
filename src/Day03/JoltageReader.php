<?php

namespace AdventOfCode\Day03;

class JoltageReader
{
    public function getJoltage(string $bank): int
    {
        $elements = array_map(fn($jolt) => (int) $jolt, str_split($bank));
        $start = array_slice($elements, 0, -1);
        $firstDigit = max($start);
        $index = array_search($firstDigit, $elements);
        $remaining = array_slice($elements, $index + 1);
        $secondDigit = max($remaining);

        return (int) (strval($firstDigit) . strval($secondDigit));
    }
}