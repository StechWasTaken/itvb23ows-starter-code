<?php

namespace App\Game;

class Hand
{
    private const PIECES = [
        "Q" => 1,
        "B" => 2,
        "S" => 2,
        "A" => 3,
        "G" => 3,
    ];
    
    private $pieces;

    public function __construct($hand = null)
    {
        if (!is_null($hand))
        {
            $this->pieces = $hand;
        }
        else
        {
            $this->pieces = array_merge([], self::PIECES);
        }
    }

    public function hasPiece($piece)
    {
        if (isset($this->pieces[$piece]))
        {
            return $this->pieces[$piece] > 0;
        }
        
        return false;
    }

    public function countPiece($piece)
    {
        if (isset($this->pieces[$piece]))
        {
            return $this->pieces[$piece];
        }
        
        return 0;
    }

    public function removePiece($piece, $amount = 1)
    {
        if (isset($this->pieces[$piece]))
        {
            $this->pieces[$piece] -= $amount;
            $this->pieces[$piece] = max(0, $this->pieces[$piece]);
        }
    }

    public function addPiece($piece)
    {
        if (isset($this->pieces[$piece]))
        {
            $this->pieces[$piece]++;
            $this->pieces[$piece] = min(self::PIECES[$piece], $this->pieces[$piece]);
        }
    }

    public function getPieces()
    {
        return []; // stub
    }
}
