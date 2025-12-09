<?php

namespace AdventOfCode\Day02;

class DuplicateValidityChecker implements ValidityChecker
{

    public function isInvalid(int $number): bool
    {
        $parts = str_split((string) $number);

        if (count($parts) % 2 !== 0) {
            return false;
        }

        $secondHalf = $parts;
        $firstHalf = array_splice($secondHalf, 0, count($secondHalf) / 2);

        return $firstHalf === $secondHalf;
    }
}