<?php

namespace PurposeMed\TicTacToe\Domain\ValueObjects;

use InvalidArgumentException;

class Position
{
    private int $row;    // The row index of the position
    private int $column; // The column index of the position

    /**
     * Initializes a position on the board.
     *
     * @param int $row The row index (must be non-negative)
     * @param int $column The column index (must be non-negative)
     * @throws InvalidArgumentException If negative values are provided
     */
    public function __construct(int $row, int $column)
    {
        if ($row < 0 || $column < 0) {
            throw new InvalidArgumentException("Position cannot have negative coordinates.");
        }
        $this->row = $row;
        $this->column = $column;
    }

    /**
     * Checks if this position is equal to another position.
     *
     * @param Position $other The position to compare with
     * @return bool True if both row and column match, otherwise false
     */
    public function equals(Position $other): bool
    {
        return $this->row === $other->row && $this->column === $other->column;
    }

    /**
     * Gets the row index of the position.
     *
     * @return int The row index
     */
    public function getRow(): int
    {
        return $this->row;
    }

    /**
     * Gets the column index of the position.
     *
     * @return int The column index
     */
    public function getColumn(): int
    {
        return $this->column;
    }
}
