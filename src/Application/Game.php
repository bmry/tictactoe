<?php

namespace PurposeMed\TicTacToe\Application;

use PurposeMed\TicTacToe\Domain\Entities\Player;
use PurposeMed\TicTacToe\Domain\Boards\Board3D;
use PurposeMed\TicTacToe\Domain\Boards\BoardInterface;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;
use PurposeMed\TicTacToe\Domain\WinningPatterns\WinningPattern3D;
use PurposeMed\TicTacToe\Domain\WinningPatterns\WinningPatternInterface;

class Game
{
    private BoardInterface $board;
    private WinningPatternInterface $winningPattern;
    private array $players;
    private int $currentPlayerIndex;

    /**
     * Initialize the game with a board, winning pattern, and players.
     */
    public function __construct(BoardInterface $board, WinningPatternInterface $winningPattern, array $players)
    {
        $this->board = $board;
        $this->winningPattern = $winningPattern;
        $this->players = $players;
        $this->currentPlayerIndex = rand(0, 1); // Randomly select the first player
    }

    /**
     * Starts the game loop.
     */
    public function play(): void
    {
        echo "Welcome to PurposeMed Tic-Tac-Toe!" . PHP_EOL;

        while (true) {
            $this->printBoard();
            $currentPlayer = $this->players[$this->currentPlayerIndex];
            echo "Player " . $currentPlayer->getName() . "'s turn (" . $currentPlayer->getMark()->getValue() . ")." . PHP_EOL;

            $row = (int)readline("Enter row: ");
            $col = (int)readline("Enter column: ");

            try {
                $position = new Position($row, $col);
                $this->board->placeMark($position, $currentPlayer->getMark());
            } catch (\Exception $e) {
                echo $e->getMessage() . PHP_EOL;
                continue;
            }

            if ($this->winningPattern->checkWinner($this->board, $currentPlayer)) {
                $this->printBoard();
                echo "Player " . $currentPlayer->getName() . " wins!" . PHP_EOL;
                break;
            }

            if ($this->isDraw()) {
                $this->printBoard();
                echo "It's a draw!" . PHP_EOL;
                break;
            }

            // Switch to the next player
            $this->currentPlayerIndex = ($this->currentPlayerIndex + 1) % count($this->players);
        }
    }

    /**
     * Prints the current state of the game board.
     */
    private function printBoard(): void
    {
        [$rows, $columns] = $this->board->getSize();

        for ($row = 0; $row < $rows; $row++) {
            $line = [];

            for ($col = 0; $col < $columns; $col++) {
                $cell = $this->board->getCell(new Position($row, $col));
                $line[] = $cell->isEmpty() ? ' ' : $cell->getMark()->getValue();
            }
            echo implode(' | ', $line) . PHP_EOL;
            if ($row < $rows - 1) {
                echo str_repeat('-', $columns * 4 - 3) . PHP_EOL;
            }
        }
    }

    /**
     * Checks if the board is full, indicating a draw.
     */
    private function isDraw(): bool
    {
        foreach ($this->board->getAllCells() as $cell) {
            if ($cell->isEmpty()) {
                return false;
            }
        }
        return true;
    }
}

$players = [
    new Player("Craig", new Mark("X")),
    new Player("Julius", new Mark("O"))
];

$board = new Board3D();
$winningPattern = new WinningPattern3D();
$game = new Game($board, $winningPattern, $players);
$game->play();
