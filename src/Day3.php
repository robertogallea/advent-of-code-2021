<?php

namespace robertogallea\AdventOfCode2021;

class Day3
{
    public function execute($input): int
    {
        $occurencies = array_fill(0, strlen($input[0]), [0, 0]);

        foreach ($input as $item) {
            foreach (str_split($item) as $i => $value) {
                $occurencies[$i][$value]++;
            }
        }

        foreach ($occurencies as $occurency) {
            $resultGamma[] = $occurency[0] < $occurency[1] ? 1 : 0;
            $resultEpsilon[] = $occurency[0] > $occurency[1] ? 1 : 0;
        }

        return bindec((implode($resultGamma))) * bindec((implode($resultEpsilon)));
    }

    public function execute2(array $input): int
    {
        $oxygen = $this->reduce($input, true);
        $co2 = $this->reduce($input, false);

        return $oxygen * $co2;
    }

    /**
     * @param array $input
     * @return int
     */
    public function reduce(array $input, bool $direction): int
    {
        $bit = 0;
        while ((sizeof($input) > 1) && ($bit < strlen($input[0]))) {
            $group = array();
            foreach ($input as $item) {
                $group[str_split($item)[$bit]][] = $item;
            }
            ksort($group);
            $chunks = array_values($group);

            if ($direction) {
                if (sizeof($chunks[0]) != sizeof($chunks[1])) {
                    $input = sizeof($chunks[1]) >= sizeof($chunks[0]) ? $chunks[1] : $chunks[0];
                } else {
                    $input = $chunks[1];
                }
            } else {
                if (sizeof($chunks[0]) != sizeof($chunks[1])) {
                    $input = sizeof($chunks[0]) <= sizeof($chunks[1]) ? $chunks[0] : $chunks[1];
                } else {
                    $input = $chunks[0];
                }
            }

            $bit++;
        }
        return bindec($input[0]);
    }
}