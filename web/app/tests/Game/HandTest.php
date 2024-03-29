<?php

use PHPUnit\Framework\TestCase;
use App\Game\Hand;

class HandTest extends TestCase
{
    public function testHand()
    {
        $hand = new Hand();

        $hand->removePiece('Q');

        $this->assertFalse($hand->hasPiece('Q'));
        $this->assertEquals(0, $hand->countPiece('Q'));
    }

    public function testHand2()
    {
        $hand = new Hand();

        $hand->removePiece('B');

        $this->assertTrue($hand->hasPiece('B'));
        $this->assertEquals(1, $hand->countPiece('B'));
    }

    public function testHand3()
    {
        $hand = new Hand();

        $hand->removePiece('S');

        $this->assertTrue($hand->hasPiece('S'));
        $this->assertEquals(1, $hand->countPiece('S'));
    }

    public function testHand4()
    {
        $hand = new Hand();

        $hand->removePiece('A');

        $this->assertTrue($hand->hasPiece('A'));
        $this->assertEquals(2, $hand->countPiece('A'));
    }

    public function testHand5()
    {
        $hand = new Hand();

        $hand->removePiece('G');

        $this->assertTrue($hand->hasPiece('G'));
        $this->assertEquals(2, $hand->countPiece('G'));
    }

    public function testHand6()
    {
        $hand = new Hand();

        $hand->addPiece('Q');

        $this->assertEquals(1, $hand->countPiece('Q'));
    }

    public function testHand7()
    {
        $hand = new Hand();

        $hand->addPiece('B');

        $this->assertEquals(2, $hand->countPiece('B'));
    }

    public function testHand8()
    {
        $hand = new Hand();

        $hand->addPiece('S');

        $this->assertEquals(2, $hand->countPiece('S'));
    }

    public function testHand9()
    {
        $hand = new Hand();

        $hand->addPiece('A');

        $this->assertEquals(3, $hand->countPiece('A'));
    }

    public function testHand10()
    {
        $hand = new Hand();

        $hand->addPiece('G');

        $this->assertEquals(3, $hand->countPiece('G'));
    }
}
