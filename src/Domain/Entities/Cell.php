<?php

namespace PurposeMed\TicTacToe\Domain\Entities;

use Exception;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;

/**
 * Represents a cell on the Tic-Tac-Toe board.
 */
class Cell
{
    private Position $position; // The position of the cell on the board
    private ?Mark $mark = null; // The mark placed in the cell (null if empty)

    /**
     * Initializes a cell with a specific position.
     *
     * @param Position $position The position of the cell on the board
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    /**
     * Places a mark in the cell.
     *
     * @param Mark $mark The mark to be placed (e.g., 'X' or 'O')
     * @throws Exception If the cell is already occupied
     */
    public function placeMark(Mark $mark): void
    {
        if ($this->mark !== null) {
            throw new Exception("Cell is already occupied!");
        }
        $this->mark = $mark;
    }

    /**
     * Checks if the cell is empty.
     *
     * @return bool True if the cell is empty, false otherwise
     */
    public function isEmpty(): bool
    {
        return $this->mark === null;
    }

    /**
     * Retrieves the mark placed in the cell.
     *
     * @return Mark|null The mark in the cell, or null if empty
     */
    public function getMark(): ?Mark
    {
        return $this->mark;
    }

    /**
     * Retrieves the position of the cell.
     *
     * @return Position The position of the cell on the board
     */
    public function getPosition(): Position
    {
        return $this->position;
    }
}
