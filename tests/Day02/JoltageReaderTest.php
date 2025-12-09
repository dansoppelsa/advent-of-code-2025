<?php

namespace Tests\Day02;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use AdventOfCode\Day03\JoltageReader;

class JoltageReaderTest extends TestCase
{
    #[Test]
    #[DataProvider('provideBatteryBanks')]
    public function it_can_read_joltage_for_a_bank_of_batteries(string $bank, int $expectedJoltage): void
    {
        $reader = new JoltageReader();
        $joltage = $reader->getJoltage($bank);

        $this->assertEquals($expectedJoltage, $joltage);
    }

    public static function provideBatteryBanks(): array
    {
        return [
            '987654321111111' => ['987654321111111', 98],
            '234234234234278' => ['234234234234278', 78],
            '818181911112111' => ['818181911112111', 92],
        ];
    }
}