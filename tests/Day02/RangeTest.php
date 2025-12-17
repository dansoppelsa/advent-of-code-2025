<?php

namespace Tests\Day02;

use AdventOfCode\Day02\EnhancedChecker;
use AdventOfCode\Day02\Range;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    #[DataProvider('provideRanges')]
    public function test_it_can_detect_invalid_numbers_in_a_range(string $rangeInput, array $invalids): void
    {
        $range = new Range($rangeInput);

        $this->assertEquals($invalids, $range->getInvalids());
    }

    public static function provideRanges(): array
    {
        return [
            '11-22 Range' => ['11-22', [11, 22]],
            '95-115 Range' => ['95-115', [99]],
            '998-1012 Range' => ['998-1012', [1010]],
            '1188511880-1188511890 Range' => ['1188511880-1188511890', [1188511885]],
            '38593856-38593862 Range' => ['38593856-38593862', [38593859]],
        ];
    }

    #[DataProvider('provideRanges2')]
    public function test_it_can_detect_invalid_numbers_in_a_range_part_2(string $rangeInput, array $invalids): void
    {
        $range = (new Range($rangeInput))->setChecker(new EnhancedChecker());

        $this->assertEquals($invalids, $range->getInvalids());
    }

    public static function provideRanges2(): array
    {
        return [
            '95-115 Range' => ['95-115', [99, 111]],
            '998-1012 Range' => ['998-1012', [999, 1010]]
        ];
    }
}