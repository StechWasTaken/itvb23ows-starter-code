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

    public function testHand6()
    {
        $hand = new Hand();

        $this->expectException(Exception::class, $hand->addPiece('Q'));
    }

    public function testHand7()
    {
        $hand = new Hand();

        $this->expectException(Exception::class, $hand->addPiece('B'));
    }

    public function testHand8()
    {
        $hand = new Hand();

        $this->expectException(Exception::class, $hand->addPiece('S'));
    }

    public function testHand9()
    {
        $hand = new Hand();

        $this->expectException(Exception::class, $hand->addPiece('A'));
    }

    public function testHand10()
    {
        $hand = new Hand();

        $this->expectException(Exception::class, $hand->addPiece('G'));
    }

    public function testHand11()
    {
        $hand = new Hand();

        $hand->removePiece('Q');

        $this->expectException(Exception::class, $hand->removePiece('Q'));
    }

    public function testHand12()
    {
        $hand = new Hand();

        $hand->removePiece('B', 2);

        $this->expectException(Exception::class, $hand->removePiece('B'));
    }

    public function testHand13()
    {
        $hand = new Hand();

        $hand->removePiece('S', 2);

        $this->expectException(Exception::class, $hand->removePiece('S'));
    }

    public function testHand14()
    {
        $hand = new Hand();

        $hand->removePiece('A', 3);

        $this->expectException(Exception::class, $hand->removePiece('A'));
    }

    public function testHand15()
    {
        $hand = new Hand();

        $hand->removePiece('G', 3);

        $this->expectException(Exception::class, $hand->removePiece('G'));
    }
}
