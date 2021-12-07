<?php

namespace robertogallea\AdventOfCode2021;

class Day4
{
    public function execute(mixed $input): int
    {
        $lines = preg_split("/\r\n|\n|\r/", $input);
        $extractedNumbers = $this->getExtractedNumbers($lines[0]);

        unset($lines[0]);
        unset($lines[1]);

        [$rowBoards, $colBoards] = $this->getBoards($lines);

        foreach ($extractedNumbers as $number) {
            foreach ($rowBoards as $boardId => &$board) {
                foreach ($board as $lineId => &$line) {
                    $found = array_search($number, $line);

                    if ($found !== false) {
                        unset($line[$found]);
                    }

                    if (sizeof($line) == 0) {
                        return $this->computeScore($board, $number);
                    }
                }
            }
        }
    }

    public function execute2(string $input): int
    {


        $lines = preg_split("/\r\n|\n|\r/", $input);
        $extractedNumbers = $this->getExtractedNumbers($lines[0]);

        unset($lines[0]);
        unset($lines[1]);

        [$rowBoards, $colBoards] = $this->getBoards($lines);

        $won = array_fill(0, sizeof($rowBoards), 0);

        foreach ($extractedNumbers as $number) {
            foreach ($rowBoards as $boardId => &$board) {
                foreach ($board as $lineId => &$line) {
                    $found = array_search($number, $line);

                    if ($found !== false) {
                        unset($line[$found]);
                    }

                    if (sizeof($line) == 0) {
                        $won[$boardId] = true;
                        if ($this->allHaveWon($won)) {
                            return $this->computeScore($board, $number);
                        }
                    }
                }
            }

            foreach ($colBoards as $boardId => &$board) {
                foreach ($board as $lineId => &$line) {
                    $found = array_search($number, $line);

                    if ($found !== false) {
                        unset($line[$found]);
                    }

                    if (sizeof($line) == 0) {
                        $won[$boardId] = true;
                        if ($this->allHaveWon($won)) {
                            return $this->computeScore($board, $number);
                        }
                    }
                }
            }
        }

    }

    /**
     * @param array|bool $lines
     * @return array
     */
    public function getBoards(array|bool $lines): array
    {
        $boards = [];
        $i = 0;
        foreach ($lines as $line) {
            if (empty($line)) {
                $i++;
            } else {
                $boards[$i][] = preg_split('/\s+/', trim($line));
            }
        }

        foreach ($boards as $i => $board) {
            foreach ($board as $j => $line) {
                foreach ($line as $k => $cell) {
                   $colBoards[$i][$k][$j] = $cell;
                }
            }
        }
        return [$boards, $colBoards];
    }

    /**
     * @param $lines
     * @return array
     */
    public function getExtractedNumbers($lines): array
    {
        return explode(",", $lines);
    }

    private function computeScore(array $board, int $number)
    {
        $score = 0;
        foreach ($board as $lines) {
            foreach ($lines as $value) {
                $score += $value;
            }
        }

        return $score * $number;
    }

    private function allHaveWon(array $won)
    {
        return array_search(0, $won) === false;
    }

}