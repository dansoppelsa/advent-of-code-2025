<?php

namespace Tests\Day04;

use AdventOfCode\Day04\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    public function test_it_can_count_accessible_cells(): void
    {
        $contents = $this->getContents();
        $grid = Grid::fromData($contents);

        $this->assertCount(13, $grid->accessibleCells());
    }

    public function test_it_can_count_total_removable_paper_rolls(): void
    {
        $contents = $this->getContents();
        $grid = Grid::fromData($contents);

        $this->assertCount(43, $grid->getRemovableCells());
    }

    protected function getContents(): array
    {
        $path = __DIR__ . '../../../solutions/Day04/sample-input.txt';

        return array_map(
            fn(string $line) => str_split($line),
            explode(PHP_EOL, file_get_contents($path))
        );
    }
}