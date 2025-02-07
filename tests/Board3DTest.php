<?php

use PHPUnit\Framework\TestCase;
use PurposeMed\TicTacToe\Domain\Boards\Board3D;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;


class Board2DTest extends TestCase
{
    public function testBoardSize()
    {
        $board = new Board3D();
        $this->assertEquals([3, 3], $board->getSize());
    }

    public function testPlacingMarkOnBoard()
    {
        $board = new Board3D();
        $mark = new Mark('X');
        $position = new Position(0, 0);

        $board->placeMark($position, $mark);
        $cell = $board->getCell($position);

        $this->assertEquals('X', $cell->getMark()->getValue());
    }

    public function testPlacingMarkOnOccupiedCellThrowsException()
    {
        $this->expectException(Exception::class);

        $board = new Board3D();
        $markX = new Mark('X');
        $markO = new Mark('O');
        $position = new Position(0, 0);

        $board->placeMark($position, $markX);
        $board->placeMark($position, $markO);
    }
}
