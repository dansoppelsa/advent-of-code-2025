<?php

namespace Tests\Day03;

use AdventOfCode\Day03\JoltageReader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

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

    #[Test]
    #[DataProvider('provideLargeBatteryBanks')]
    public function it_can_read_large_joltages_for_a_bank_of_batteries(string $bank, int $expectedJoltage): void
    {
        $reader = new JoltageReader();
        $joltage = $reader->getLargeJoltage($bank);

        $this->assertEquals($expectedJoltage, $joltage);
    }

    public static function provideLargeBatteryBanks(): array
    {
        return [
            '987654321111111 Battery' => ['987654321111111', 987654321111],
            '811111111111119 Battery' => ['811111111111119', 811111111119],
            '234234234234278 Battery' => ['234234234234278', 434234234278],
            '818181911112111 Battery' => ['818181911112111', 888911112111],
//            '8221441533335523934234684734333842352334638213344455472314354533231333442559833436143312222328593824 Battery' => ['8221441533335523934234684734333842352334638213344455472314354533231333442559833436143312222328593824', 998648593824],
        ];
    }
}