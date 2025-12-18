<?php

namespace Tests\Day05;

use AdventOfCode\Day05\IngredientList;
use PHPUnit\Framework\TestCase;

class IngredientListTest extends TestCase
{
    public function test_it_can_count_fresh_ingredients(): void
    {
        $contents = file_get_contents(__DIR__ . '/../../solutions/Day05/sample-input.txt');

        $ingredientList = IngredientList::fromData($contents);

        $this->assertCount(3, $ingredientList->getFresh());
    }
}