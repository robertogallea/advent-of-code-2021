<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use robertogallea\AdventOfCode2021\Day3;

class Day3Tests extends TestCase
{
    /**
     * @test
     * @dataProvider day3_part1_input
     */
    public function test_day3_part1($input, $result)
    {
        $day3 = new Day3;
        $this->assertEquals($result, $day3->execute($input));
    }

    public function day3_part1_input()
    {
        return [
            [[
                "00100",
                "11110",
                "10110",
                "10111",
                "10101",
                "01111",
                "00111",
                "11100",
                "10000",
                "11001",
                "00010",
                "01010",
            ], 198
            ], [
                file("input/Day3.txt", FILE_IGNORE_NEW_LINES), 4103154
            ]
        ];
    }

    /**
     * @test
     * @dataProvider day3_part2_input
     */
    public function test_day3_part2($input, $result)
    {
        $day3 = new Day3;
        $this->assertEquals($result, $day3->execute2($input, true));
    }

    public function day3_part2_input()
    {
        return [
            [[
                "00100",
                "11110",
                "10110",
                "10111",
                "10101",
                "01111",
                "00111",
                "11100",
                "10000",
                "11001",
                "00010",
                "01010",
            ], 230
            ], [
                file("input/Day3.txt", FILE_IGNORE_NEW_LINES), 4245351
            ]
        ];
    }
}