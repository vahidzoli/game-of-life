<?php


class GameLifeInfinite
{
    private array $liveCells = [];

    public function __construct(array $initial = [])
    {
        foreach ($initial as [$r, $c]) {
            $this->liveCells["$r,$c"] = 1;
        }
    }

    public function print(int $minRow, int $maxRow, int $minCol, int $maxCol): void
    {
        for ($r = $minRow; $r <= $maxRow; $r++) {
            for ($c = $minCol; $c <= $maxCol; $c++) {
                echo isset($this->liveCells["$r,$c"]) ? '#' : '.';
            }
            echo "\n";
        }
    }

    public function glider($rows, $cols): void
    {
        $pattern = [[0,1], [1,2], [2,0], [2,1], [2,2]];
        $row = intdiv($rows, 2) - 1;
        $col = intdiv($cols, 2) - 1;

        foreach ($pattern as [$r, $c]) {
            $this->liveCells[($r + $row) . ',' . ($c + $col)] = 1;
        }
    }

    public function nextGen(): void
    {
        $neighborCounts = [];

        // Count neighbors
        foreach ($this->liveCells as $cell => $value) {
            [$r, $c] = explode(',', $cell);

            for ($dr = -1; $dr <= 1; $dr++) {
                for ($dc = -1; $dc <= 1; $dc++) {
                    if ($dr === 0 && $dc === 0) continue;
                    $key = ($r + $dr) . ',' . ($c + $dc);
                    $neighborCounts[$key] = ($neighborCounts[$key] ?? 0) + 1;
                }
            }
        }

        $newLiveCells = [];

        // Apply rules
        foreach ($neighborCounts as $cell => $count) {
            if ($count === 3 || ($count === 2 && isset($this->liveCells[$cell]))) {
                $newLiveCells[$cell] = 1;
            }
        }

        $this->liveCells = $newLiveCells;
    }
}
