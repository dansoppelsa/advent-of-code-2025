<?php

namespace AdventOfCode\Day02;

class EnhancedChecker implements ValidityChecker
{
    public function isInvalid(int $number): bool
    {
        $parts = str_split((string) $number);
        $denominator = count($parts) - 1;

        while($denominator > 0) {
            if (count($parts) % $denominator !== 0) {
                $denominator--;
                continue;
            }

            $chunks = array_chunk($parts, $denominator);
            if (count(array_unique($chunks, SORT_REGULAR)) === 1) {
                return true;
            }

            $denominator--;
        }

        return false;
    }
}