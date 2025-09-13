<?php

use PHPUnit\Framework\TestCase;

require_once 'GameLifeInfinite.php';

class GameLifeInfiniteTest extends TestCase
{
    public function testConstructorInitializesLiveCells()
    {
        $initial = [[0, 0], [1, 1], [2, 2]];
        $game = new GameLifeInfinite($initial);

        $expected = [
            '0,0' => 1,
            '1,1' => 1,
            '2,2' => 1,
        ];

        $reflection = new ReflectionClass($game);
        $property = $reflection->getProperty('liveCells');
        $property->setAccessible(true);

        $this->assertSame($expected, $property->getValue($game));
    }

    public function testGliderPlacesPatternCorrectly()
    {
        $rows = 5;
        $cols = 5;
        $game = new GameLifeInfinite();
        $game->glider($rows, $cols);

        $reflection = new ReflectionClass($game);
        $property = $reflection->getProperty('liveCells');
        $property->setAccessible(true);
        $liveCells = $property->getValue($game);

        $row = intdiv($rows, 2) - 1;
        $col = intdiv($cols, 2) - 1;
        $expectedPositions = [
            ($row + 0) . ',' . ($col + 1),
            ($row + 1) . ',' . ($col + 2),
            ($row + 2) . ',' . ($col + 0),
            ($row + 2) . ',' . ($col + 1),
            ($row + 2) . ',' . ($col + 2),
        ];

        foreach ($expectedPositions as $pos) {
            $this->assertArrayHasKey($pos, $liveCells);
        }
    }

    public function testNextGenAppliesRulesCorrectly()
    {
        $initial = [[1, 0], [1, 1], [1, 2]];
        $game = new GameLifeInfinite($initial);

        $game->nextGen();

        $reflection = new ReflectionClass($game);
        $property = $reflection->getProperty('liveCells');
        $property->setAccessible(true);
        $liveCells = $property->getValue($game);

        $expected = [
            '0,1' => 1,
            '1,1' => 1,
            '2,1' => 1,
        ];

        $this->assertSame($expected, $liveCells);
    }

    public function testPrintOutputsCorrectly()
    {
        $initial = [[0, 0], [1, 1]];
        $game = new GameLifeInfinite($initial);

        $this->expectOutputString("#.\n.#\n");
        $game->print(0, 1, 0, 1);
    }
}
