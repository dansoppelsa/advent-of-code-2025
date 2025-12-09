<?php

namespace AdventOfCode\Day01;

class
Dial
{
    protected int $position = 50;
    protected array $positions = [];

    public function process(string $turn): void
    {
        $direction = $turn[0];
        $steps = (int)substr($turn, 1);
        $before = $this->position;
        $this->position = match ($direction) {
            'R' => ($this->position + $steps) % 100,
            'L' => ($this->position - $steps) % 100,
            default => $this->position,
        };
        if ($this->position < 0) {
            $this->position = ($this->position % 100) + 100;
        }
        $this->positions[] = [
            'direction' => $direction,
            'before' => $before,
            'after' => $this->position,
            'steps' => $steps,
        ];
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function zeroPasses(): int
    {
        $count = array_map(function (array $pos) {
            $fullRotations = floor($pos['steps'] / 100);

          if (
                ($pos['direction'] === 'L' && ($pos['after'] > $pos['before'])) && $pos['before'] !== 0 ||
                ($pos['direction'] === 'R' && $pos['after'] < $pos['before']) && $pos['before'] !== 0
            ) {
                $additional = 1;
            } else {
                $additional = $pos['after'] !== 0 ? 0 : 1;
            }

            return $fullRotations + $additional;
        }, $this->getPositions());

        return array_sum($count);
    }
}
