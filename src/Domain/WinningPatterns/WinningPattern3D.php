<?php

namespace PurposeMed\TicTacToe\Domain\WinningPatterns;

use PurposeMed\TicTacToe\Domain\Boards\BoardInterface;
use PurposeMed\TicTacToe\Domain\Entities\Player;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;

class WinningPattern3D implements WinningPatternInterface
{
    /**
     * Checks if the given player has won the game based on the board state.
     *
     * @param BoardInterface $board The game board
     * @param Player $player The player whose win condition is being checked
     * @return bool True if the player has won, false otherwise
     */
    public function checkWinner(BoardInterface $board, Player $player): bool
    {
        [$rows, $columns] = $board->getSize();
        $mark = $player->getMark();

        // Check for winning rows
        for ($row = 0; $row < $rows; $row++) {
            $rowCells = array_filter($board->getAllCells(), fn($cell) => $cell->getPosition()->getRow() === $row);
            if ($this->allCellsMatch($rowCells, $mark)) {
                return true;
            }
        }

        // Check for winning columns
        for ($col = 0; $col < $columns; $col++) {
            $colCells = array_filter($board->getAllCells(), fn($cell) => $cell->getPosition()->getColumn() === $col);
            if ($this->allCellsMatch($colCells, $mark)) {
                return true;
            }
        }

        // Check for main diagonal (top-left to bottom-right)
        $mainDiagonal = array_filter($board->getAllCells(), fn($cell) => $cell->getPosition()->getRow() === $cell->getPosition()->getColumn());

        // Check for anti-diagonal (top-right to bottom-left)
        $antiDiagonal = array_filter($board->getAllCells(), fn($cell) => $cell->getPosition()->getRow() + $cell->getPosition()->getColumn() === $columns - 1);

        // Return true if either diagonal has all matching marks
        return $this->allCellsMatch($mainDiagonal, $mark) || $this->allCellsMatch($antiDiagonal, $mark);
    }

    /**
     * Helper function to check if all cells in a given set contain the same mark.
     *
     * @param array $cells List of cells to check
     * @param Mark $mark The player's mark (X or O)
     * @return bool True if all cells contain the same mark, false otherwise
     */
    private function allCellsMatch(array $cells, Mark $mark): bool
    {
        foreach ($cells as $cell) {
            if ($cell->isEmpty() || $cell->getMark()->getValue() !== $mark->getValue()) {
                return false;
            }
        }
        return true;
    }
}
