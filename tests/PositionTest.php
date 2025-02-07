<?php

use PHPUnit\Framework\TestCase;
use PurposeMed\TicTacToe\Domain\ValueObjects\Position;

class PositionTest extends TestCase
{
    public function testValidPosition()
    {
        $position = new Position(1, 2);
        $this->assertEquals(1, $position->getRow());
        $this->assertEquals(2, $position->getColumn());
    }

    public function testNegativePositionThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);
        new Position(-1, 2);
    }

    public function testPositionEquality()
    {
        $pos1 = new Position(1, 1);
        $pos2 = new Position(1, 1);
        $pos3 = new Position(2, 2);

        $this->assertTrue($pos1->equals($pos2));
        $this->assertFalse($pos1->equals($pos3));
    }
}
