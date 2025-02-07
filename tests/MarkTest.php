<?php

use PHPUnit\Framework\TestCase;
use PurposeMed\TicTacToe\Domain\ValueObjects\Mark;

class MarkTest extends TestCase
{
    public function testValidMark()
    {
        $mark = new Mark('X');
        $this->assertEquals('X', $mark->getValue());
    }

    public function testInvalidMarkThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);
        new Mark('123');
    }
}
