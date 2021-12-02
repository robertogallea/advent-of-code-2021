<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use robertogallea\AdventOfCode2021\Day2;

class Day2Tests extends TestCase
{
    /**
     * @test
     * @dataProvider day2_part1_input
     */
    public function test_day2_part1($input, $result)
    {
        $day2 = new Day2;
        $this->assertEquals($result, $day2->execute($input));
    }

    public function day2_part1_input()
    {
        return [
            [[
                "forward 5",
                "down 5",
                "forward 8",
                "up 3",
                "down 8",
                "forward 2",
            ], 150
            ], [
                file("input/Day2.txt", FILE_IGNORE_NEW_LINES), 1459206
            ]
        ];
    }

    /**
     * @test
     * @dataProvider day2_part2_input
     */
    public function test_day2_part2($input, $result)
    {
        $day2 = new Day2;
        $this->assertEquals($result, $day2->execute($input, true));
    }

    public function day2_part2_input()
    {
        return [
            [[
                "forward 5",
                "down 5",
                "forward 8",
                "up 3",
                "down 8",
                "forward 2",
            ], 900
            ], [
                file("input/Day2.txt", FILE_IGNORE_NEW_LINES), 1320534480
            ]
        ];
    }
}