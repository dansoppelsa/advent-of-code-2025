<?php

namespace AdventOfCode\Day04;

class Grid
{
    public function __construct(protected array $rows)
    {
        foreach ($this->rows as $row) {
            foreach ($row as $cell) {
                $cell->setGrid($this);
            }
        }
    }

    public static function fromData(array $data): self
    {
        $d = [];

        foreach ($data as $y => $row) {
            foreach ($row as $x => $value) {
                $d[$y][$x] = new Cell($x, $y, $value);
            }
        }

        return new self($d);
    }

    public function accessibleCells(): array
    {
        $accessible = [];

        foreach ($this->rows as $row) {
            foreach ($row as $cell) {
                if ($cell->isAccessible()) {
                    $accessible[] = $cell;
                }
            }
        }

        return $accessible;
    }

    public function getRemovableCells(): array
    {
        $accessible = $this->accessibleCells();
        $removable = [];

        while (count($accessible) > 0) {
            $removable = [...$accessible, ...$removable];

            foreach ($accessible as $cell) {
                $this->removeCell($cell->y, $cell->x);
            }

            $accessible = $this->accessibleCells();
        }

        return $removable;
    }

    public function getCell(int $y, int $x): ?Cell
    {
        return $this->rows[$y][$x] ?? null;
    }

    public function removeCell(int $y, int $x): void
    {
        if (isset($this->rows[$y][$x])) {
            $this->rows[$y][$x]->setValue('.');
        }
    }
}