<?php

namespace PurposeMed\TicTacToe\Domain\ValueObjects;

use InvalidArgumentException;

/**
 * Represents a mark in the Tic-Tac-Toe game (e.g., 'X' or 'O').
 */
class Mark
{
    private string $value; // The value of the mark (must be a single letter)

    /**
     * Initializes a mark with a given value.
     *
     * @param string $value The mark value (e.g., 'X' or 'O')
     * @throws InvalidArgumentException If the value is not a single letter
     */
    public function __construct(string $value)
    {
        if (!preg_match('/^[A-Za-z]$/', $value)) {
            throw new InvalidArgumentException("Invalid mark value: $value");
        }
        $this->value = $value;
    }

    /**
     * Gets the value of the mark.
     *
     * @return string The mark value
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
