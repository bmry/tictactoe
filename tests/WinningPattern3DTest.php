<?php

use PHPUnit\Framework\TestCase;
use PurposeMed\TicTacToe\Domain\Boards\Board3D;
use PurposeMed\TicTacToe\Domain\WinningPatterns\WinningPattern3D;
use PurposeMed\TicTacToe\Domain\ValueObjects\{Mark, Position};
use PurposeMed\TicTacToe\Domain\Entities\Player;

class WinningPattern2DTest extends TestCase
{
    public function testRowWinningCondition()
    {
        $board = new Board3D();
        $winningPattern = new WinningPattern3D();
        $player = new Player('Alice', new Mark('X'));

        $board->placeMark(new Position(0, 0), $player->getMark());
        $board->placeMark(new Position(0, 1), $player->getMark());
        $board->placeMark(new Position(0, 2), $player->getMark());

        $this->assertTrue($winningPattern->checkWinner($board, $player));
    }
}
