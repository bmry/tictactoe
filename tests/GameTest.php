<?php

use PHPUnit\Framework\TestCase;
use PurposeMed\TicTacToe\Application\Game;
use PurposeMed\TicTacToe\Domain\Boards\Board3D;
use PurposeMed\TicTacToe\Domain\WinningPatterns\WinningPattern3D;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\Entities\Player;


class GameTest extends TestCase
{
    public function testGameStartsWithTwoPlayers()
    {
        $board = new Board3D();
        $winningPattern = new WinningPattern3D();
        $players = [new Player("Alice", new Mark("X")), new Player("Bob", new Mark("O"))];

        $game = new Game($board, $winningPattern, $players);

        $this->assertCount(2, $players);
        $this->assertEquals("Alice", $players[0]->getName());
        $this->assertEquals("Bob", $players[1]->getName());
    }
}
