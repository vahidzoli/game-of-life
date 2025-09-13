<?php

class GameLife
{
    private $rows;
    private $cols;
    private $grid;

    public function __construct(int $rows, int $cols) 
    {
        $this->rows = $rows;
        $this->cols = $cols;
        $this->grid = array_fill(0, $rows, array_fill(0, $cols, 0));
    }

    public function print(): void
    {
        for($i=0; $i<$this->rows; $i++) {
            for($j=0; $j<$this->cols; $j++) {
                print $this->grid[$i][$j] ? '$' : '.';
            }

            print "\n";
        }
    }

    public function glider(array $pattern = null): void
    {
        $pattern = $pattern ?? [[0,1], [1,2], [2,0], [2,1], [2,2]];

        $row = intdiv($this->rows, 2) - 1;
        $col = intdiv($this->cols, 2) - 1;

        foreach($pattern as [$r, $c]) {
            $this->grid[$row + $r][$col + $c] = 1;
        }
    }

    private function liveNeighbors(int $row, int $col): int
    {
        $count = 0;

        $directions = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1],
            [-1, -1],
            [-1, 1],
            [1, -1],
            [1, 1], 
        ];
        
        foreach($directions as [$dr, $dc]) {
            $newRow = $row + $dr;
            $newCol = $col + $dc;
    
            if($newRow >= 0 && $newRow < $this->rows && $newCol >= 0 && $newCol < $this->cols) {
                $count += $this->grid[$newRow][$newCol];
            }
        }

        return $count;
    }

    public function nextGen(): void
    {
        $newGrid = array_fill(0, $this->rows, array_fill(0, $this->cols, 0));
        for($r = 0; $r < $this->rows; $r++) {
            for($c = 0; $c < $this->cols; $c++) {
                $n = $this->liveNeighbors($r, $c);
                if($this->grid[$r][$c] === 1) {
                    if($n === 2 || $n === 3) {
                        $newGrid[$r][$c] = 1;
                    }
                } else {
                    if ($n === 3) {
                        $newGrid[$r][$c] = 1;
                    }
                }
            }
        }
        $this->grid = $newGrid;
    }
}

$options = getopt("", ["rows::", "cols::", "gens::"]);
$rows = isset($options["rows"]) ? (int)$options["rows"] : 25;
$cols = isset($options["cols"]) ? (int)$options["cols"] : 25;
$generation = isset($options["gens"]) ? (int)$options["gens"] : 12;

$gameLife = new GameLife($rows, $cols);
$gameLife->glider();

print("========== gen 0 ========== \n");
$gameLife->print();

for($i=1; $i<=$generation; $i++) {
    $gameLife->nextGen();
    print("========== gen $i ========== \n");
    $gameLife->print();
}