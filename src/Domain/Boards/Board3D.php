<?php

namespace PurposeMed\TicTacToe\Domain\Boards;

use Exception;
use PurposeMed\TicTacToe\Domain\Entities\Cell;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;

class Board3D implements BoardInterface
{
    private array $cells; // Stores the 3D grid of cells
    private int $rows; // Number of rows in the board
    private int $columns; // Number of columns in the board

    /**
     * Initializes the board with a specified number of rows and columns.
     * Defaults to a 3x3 board if no parameters are provided.
     *
     * @param int $rows Number of rows
     * @param int $columns Number of columns
     */
    public function __construct(int $rows = 3, int $columns = 3)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->cells = [];

        // Initialize the board by creating Cell objects for each position
        for ($row = 0; $row < $rows; $row++) {
            for ($col = 0; $col < $columns; $col++) {
                $this->cells[] = new Cell(new Position($row, $col));
            }
        }
    }

    /**
     * Retrieves a cell at a given position.
     *
     * @param Position $position The position of the cell
     * @return Cell The cell object at the specified position
     * @throws Exception If the cell does not exist
     */
    public function getCell(Position $position): Cell
    {
        foreach ($this->cells as $cell) {
            if ($cell->getPosition()->equals($position)) {
                return $cell;
            }
        }
        throw new Exception("Cell not found!");
    }

    /**
     * Places a mark on the specified position.
     *
     * @param Position $position The position where the mark should be placed
     * @param Mark $mark The mark (e.g., 'X' or 'O') to be placed
     * @throws Exception If the cell is already occupied
     */
    public function placeMark(Position $position, Mark $mark): void
    {
        $cell = $this->getCell($position);
        $cell->placeMark($mark);
    }

    /**
     * Retrieves all cells in the board.
     *
     * @return array List of all cells
     */
    public function getAllCells(): array
    {
        return $this->cells;
    }

    /**
     * Returns the size of the board (rows and columns).
     *
     * @return array An array containing the number of rows and columns
     */
    public function getSize(): array
    {
        return [$this->rows, $this->columns];
    }
}
