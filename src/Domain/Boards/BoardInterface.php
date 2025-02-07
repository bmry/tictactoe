<?php

namespace PurposeMed\TicTacToe\Domain\Boards;

use PurposeMed\TicTacToe\Domain\Entities\Cell;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;

interface BoardInterface
{
    public function getCell(Position $position): Cell;
    public function placeMark(Position $position, Mark $mark): void;
    public function getAllCells(): array;
    public function getSize(): array;
}
