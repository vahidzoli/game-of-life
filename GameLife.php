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
}

$rows = $cols = 25;

$gameLife = new GameLife($rows, $cols);
$gameLife->glider();

print("========== gen 0 ========== \n");
$gameLife->print();