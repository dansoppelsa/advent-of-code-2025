<?php

namespace AdventOfCode\Day04;

class Cell
{
    protected Grid $grid;

    public function __construct(public readonly int $x, public readonly int $y, protected string $value)
    {
    }

    public function isPaperRoll(): bool
    {
        return $this->value === '@';
    }

    public function isEmpty(): bool
    {
        return $this->value === '.';
    }

    public function setGrid(Grid $grid): self
    {
        $this->grid = $grid;
        return $this;
    }

    public function getAdjacentCells(): array
    {
        return array_values(array_filter([
            $this->grid->getCell($this->y - 1, $this->x), // Up
            $this->grid->getCell($this->y - 1, $this->x + 1), // Up-Right
            $this->grid->getCell($this->y, $this->x + 1), // Right
            $this->grid->getCell($this->y + 1, $this->x + 1), // Down-Right
            $this->grid->getCell($this->y + 1, $this->x), // Down
            $this->grid->getCell($this->y + 1, $this->x - 1), // Down-Left
            $this->grid->getCell($this->y, $this->x - 1), // Left
            $this->grid->getCell($this->y - 1, $this->x - 1), // Up-Left
        ]));
    }

    public function isAccessible(): bool
    {
        if ($this->isEmpty()) {
            return false;
        }

        $paperTowel = array_filter($this->getAdjacentCells(), fn(Cell $cell) => $cell->isPaperRoll());

        return count($paperTowel) < 4;
    }
}