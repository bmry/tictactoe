<?php

namespace PurposeMed\TicTacToe\Domain\Entities;

use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;

/**
 * Represents a player in the Tic-Tac-Toe game.
 */
class Player
{
    private string $name; // The player's name
    private Mark $mark;   // The mark assigned to the player (e.g., 'X' or 'O')

    /**
     * Initializes a player with a name and a mark.
     *
     * @param string $name The name of the player
     * @param Mark $mark The mark assigned to the player
     */
    public function __construct(string $name, Mark $mark)
    {
        $this->name = $name;
        $this->mark = $mark;
    }

    /**
     * Gets the player's name.
     *
     * @return string The player's name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets the player's mark.
     *
     * @return Mark The player's mark
     */
    public function getMark(): Mark
    {
        return $this->mark;
    }
}
