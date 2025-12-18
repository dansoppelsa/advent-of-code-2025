<?php

namespace AdventOfCode\Day05;

class IngredientList
{
    public function __construct(public readonly array $ranges, public readonly array $ingredients)
    {
    }

    public static function fromData(string $data): self
    {
        $contents = explode(PHP_EOL . PHP_EOL, $data);
        $ranges = array_map(
            fn(string $line) => array_map('intval', [...explode('-', $line)]),
            explode(PHP_EOL, $contents[0])
        );
        $ingredients = array_map(fn(string $line) => (int) trim($line), explode(PHP_EOL, $contents[1]));

        return new self($ranges, $ingredients);
    }

    public function getFresh(): array
    {
        return array_values(array_filter(
            $this->ingredients,
            fn(int $ingredient) => $this->isFresh($ingredient)
        ));
    }

    private function isFresh(int $ingredient): bool
    {
        foreach ($this->ranges as $range) {
            if ($ingredient >= $range[0] && $ingredient <= $range[1]) {
                return true;
            }
        }

        return false;
    }
}