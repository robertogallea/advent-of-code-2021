<?php

namespace robertogallea\AdventOfCode2021;

class Day2
{
    public function execute($input, $v2 = false): int
    {
        $position = $depth = $aim = 0;

        if (!$v2) {
            $move = array($this, "simpleMove");
            $valueToUpdate = &$depth;
        } else {
            $move = array($this, "enhancedMove");
            $valueToUpdate = &$aim;
        }

        foreach ($input as $value) {
            [$direction, $amount] = explode(" ", $value);
            match($direction) {
                "forward" => [$position, $depth] = $move($position, $depth, $amount, $aim),
                "down" => $this->update($valueToUpdate, $amount),
                "up" => $this->update($valueToUpdate, -$amount),
            };
        }

        return $position * $depth;
    }

    private function update(&$value, $amount)
    {
        $value += $amount;
    }

    private function simpleMove(int $position, int $depth, int $amount, $aim): array
    {
        return [$position + $amount, $depth];
    }

    private function enhancedMove(int $position, int $depth, int $amount, $aim)
    {
        return [
            $position + $amount,
            $depth + $amount * $aim,
        ];
    }
}