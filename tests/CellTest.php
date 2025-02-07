<?php

use PHPUnit\Framework\TestCase;
use PurposeMed\TicTacToe\Domain\Entities\Cell;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;

class CellTest extends TestCase
{
    public function testCellInitiallyEmpty()
    {
        $cell = new Cell(new Position(0, 0));
        $this->assertTrue($cell->isEmpty());
    }

    public function testPlacingMark()
    {
        $cell = new Cell(new Position(0, 0));
        $mark = new Mark('X');
        $cell->placeMark($mark);

        $this->assertFalse($cell->isEmpty());
        $this->assertEquals('X', $cell->getMark()->getValue());
    }

    public function testPlacingMarkOnOccupiedCellThrowsException()
    {
        $this->expectException(Exception::class);

        $cell = new Cell(new Position(0, 0));
        $markX = new Mark('X');
        $markO = new Mark('O');

        $cell->placeMark($markX);
        $cell->placeMark($markO); // This should throw an exception
    }
}
