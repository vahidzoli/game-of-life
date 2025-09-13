<?php

require_once 'GameLifeInfinite.php';

$rows = 25;
$cols = 25;

$game = new GameLifeInfinite();
$game->glider($rows, $cols);

$generation = 5;

for ($i = 0; $i < $generation; $i++) {
    echo "========= gen $i ========== \n";
    $game->print(0, $rows, 0, $cols);
    $game->nextGen();
}
