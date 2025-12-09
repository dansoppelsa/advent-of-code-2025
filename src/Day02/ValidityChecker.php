<?php

namespace AdventOfCode\Day02;

interface ValidityChecker
{
    public function isInvalid(int $number): bool;
}