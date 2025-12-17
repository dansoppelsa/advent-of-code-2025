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

    // find the largest of the first 4 digits
    // eliminate anything before that digit
    // for all digits after that, start with 1 and eliminate
        // move to 2 and eliminate
        // do until we are down to 12 digits
    public function getLargeJoltage(string $bank, $length = 12): int
    {
        $removeCount = strlen($bank) - $length;
        $elements = array_map(fn($jolt) => (int) $jolt, str_split($bank));
        $max = max(array_slice($elements, 0, $removeCount + 1));
        $maxIndex = array_search($max, $elements);
        $elements = array_slice($elements, $maxIndex + 1);
        $counter = 0;
        $remove = [];
        $eliminationCount = $removeCount - $maxIndex;

        while (count($remove) < $eliminationCount && $counter < 10) {
            foreach ($elements as $index => $element) {
                if ($element === $counter) {
                    $remove[] = $index;
                    if (count($remove) === $eliminationCount) {
                        break;
                    }
                }
            }
            $counter++;
        };

        foreach ($remove as $removal) {
            unset($elements[$removal]);
        }

        return (int) ($max . implode('', $elements));
    }
}