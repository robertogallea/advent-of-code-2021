<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use robertogallea\AdventOfCode2021\Day1;

class Day1Tests extends TestCase
{
    /**
     * @test
     * @dataProvider day1_part1_input
     */
    public function test_day1_part1($input, $result)
    {
        $day1 = new Day1;
        $this->assertEquals($result, $day1->execute($input));
    }

    public function day1_part1_input()
    {
        return [
            [[
                199,
                200,
                208,
                210,
                200,
                207,
                240,
                269,
                260,
                263,
            ], 7
            ],[
                file("input/Day1.txt", FILE_IGNORE_NEW_LINES), 1754
            ]
        ];
    }

    /**
     * @test
     * @dataProvider day1_part2_input
     */
    public function test_day1_part2($input, $result)
    {
        $day1 = new Day1;
        $this->assertEquals($result, $day1->execute($input, 3));
    }

    public function day1_part2_input()
    {
        return [
            [[
                199,
                200,
                208,
                210,
                200,
                207,
                240,
                269,
                260,
                263,
            ], 5
            ],[
                file("input/Day1.txt", FILE_IGNORE_NEW_LINES), 1789
            ]
        ];
    }
}