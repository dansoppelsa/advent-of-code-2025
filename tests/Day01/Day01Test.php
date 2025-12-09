<?php

namespace Tests\Day01;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use AdventOfCode\Day01\Dial;

class
Day01Test extends TestCase
{
    #[DataProvider('provideTurns')]
    public function test_it_do(array $data, int $zeroPasses): void
    {
        $dial = new Dial();
        foreach ($data as $direction) {
            $dial->process($direction);
        }

        $this->assertEquals($zeroPasses, $dial->zeroPasses());
    }

    public static function provideTurns(): array
    {
        return [
            [['L68'], 1],
            [['L68', 'L30'], 1],
            [['L68', 'L30', 'R48'], 2],
            [['L68', 'L30', 'R48', 'L5'], 2],
            [['L68', 'L30', 'R48', 'L5', 'R60'], 3],
            [['L68', 'L30', 'R48', 'L5', 'R60', 'L55'], 4],
            [['L68', 'L30', 'R48', 'L5', 'R60', 'L55', 'L1'], 4],
            [['L68', 'L30', 'R48', 'L5', 'R60', 'L55', 'L1', 'L99'], 5],
            [['L68', 'L30', 'R48', 'L5', 'R60', 'L55', 'L1', 'L99', 'R14'], 5],
            [['L68', 'L30', 'R48', 'L5', 'R60', 'L55', 'L1', 'L99', 'R14', 'L82'], 6],
        ];
    }
}