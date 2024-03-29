<?php

namespace App\Game;

class Hand
{
    private $pieces = [
        "Q" => 1,
        "B" => 2,
        "S" => 2,
        "A" => 3,
        "G" => 3,
    ];

    public function __construct()
    {
        // stub
    }

    public function hasPiece($piece)
    {
        return false; // stub
    }

    public function removePiece($piece, $amount = 1)
    {
        return null; // stub
    }

    public function addPiece($piece)
    {
        return null; // stub
    }
}
