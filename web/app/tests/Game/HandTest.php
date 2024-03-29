<?php

use PHPUnit\Framework\TestCase;
use App\Game\Hand;

class HandTest extends TestCase
{
    public function testHand()
    {
        $hand = new Hand();

        $hand->removePiece('Q');

        $this->assertEquals(0, $hand->hasPiece('Q'));
    }

    public function testHand2()
    {
        $hand = new Hand();

        $hand->removePiece('B');

        $this->assertEquals(1, $hand->hasPiece('B'));
    }

    public function testHand3()
    {
        $hand = new Hand();

        $hand->removePiece('S');

        $this->assertEquals(1, $hand->hasPiece('S'));
    }

    public function testHand4()
    {
        $hand = new Hand();

        $hand->removePiece('A');

        $this->assertEquals(2, $hand->hasPiece('A'));
    }

    public function testHand5()
    {
        $hand = new Hand();

        $hand->removePiece('G');

        $this->assertEquals(2, $hand->hasPiece('G'));
    }
}
