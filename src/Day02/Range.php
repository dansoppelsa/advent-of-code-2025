<?php

namespace AdventOfCode\Day02;

class Range
{
    protected $validityChecker;

    public function __construct(protected string $range)
    {
    }

    public function getInvalids(): array
    {
        $range = range(...array_map(fn($end) => (int) $end, explode('-', $this->range)));

        return array_values(array_filter($range, fn($number) => $this->isInvalid($number)));
    }

    protected function checker(): ValidityChecker
    {
        if (! isset($this->validityChecker)) {
            $this->validityChecker = new DuplicateValidityChecker();
        }

        return $this->validityChecker;
    }

    public function setChecker(ValidityChecker $validityChecker): self
    {
        $this->validityChecker = $validityChecker;

        return $this;
    }

    protected function isInvalid(int $number): bool
    {
        return $this->checker()->isInvalid($number);
    }
}