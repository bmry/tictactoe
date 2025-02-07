<?php

require_once 'vendor/autoload.php';

use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\Entities\Player;
use PurposeMed\TicTacToe\Domain\Boards\Board3D;
use PurposeMed\TicTacToe\Domain\WinningPatterns\WinningPattern3D;
use PurposeMed\TicTacToe\Application\Game;

$players = [new Player("Alice", new Mark("X")), new Player("Bob", new Mark("O"))];
$board = new Board3D();
$winningPattern = new WinningPattern3D();
$game = new Game($board, $winningPattern, $players);
$game->play();
