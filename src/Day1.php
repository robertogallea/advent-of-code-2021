<?php

namespace robertogallea\AdventOfCode2021;

class Day1
{
    public function execute($input, $window = 1): int
    {
        if ($window > 1) {
            $input = $this->filterInput($input, $window);
        }

        $input2 = $input;
        array_shift($input);
        $input[] = $input[sizeof($input) - 1];

        $diff = array_map(
            fn($current, $previous) => $current > $previous ? 1 : 0,
            $input,
            $input2
        );

        return array_sum($diff);
    }

    private function filterInput($input, mixed $window): array
    {
        for ($i = 0; $i < sizeof($input) - $window + 1; $i++) {
            for ($j = 0; $j < $window - 1; $j++) {
                $input[$i] += $input[$i + $j + 1];
            }
        }
        $input = array_splice($input, 0, -$window + 1);

        return $input;
    }
}