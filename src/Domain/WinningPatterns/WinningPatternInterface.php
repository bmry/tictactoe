<?php

namespace PurposeMed\TicTacToe\Domain\WinningPatterns;

use PurposeMed\TicTacToe\Domain\Boards\BoardInterface;
use PurposeMed\TicTacToe\Domain\Entities\Player;

interface WinningPatternInterface
{
    public function checkWinner(BoardInterface $board, Player $player): bool;
}
