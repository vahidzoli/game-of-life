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
}

$rows = $cols = 25;

$gameLife = new GameLife($rows, $cols);
$gameLife->print();