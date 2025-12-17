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

    public function getLargeJoltage(string $bank, $length = 12): int
    {
        $elements = array_map(fn($jolt) => (int) $jolt, str_split($bank));
        $currentIndex = 0;
        $result = [];
        while (count($result) < $length) {
            $remaining = $length - count($result);
            $l = count($elements) - $remaining - $currentIndex + 1;
            $pluckFrom = array_slice($elements, $currentIndex, $l);
            $next = max($pluckFrom);
            $result[] = $next;
            $currentIndex += array_search($next, $pluckFrom) + 1;
        }

        return (int) implode('', $result);
    }
}