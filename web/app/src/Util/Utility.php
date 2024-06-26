<?php

namespace App\Util;

class Utility
{
    public const OFFSETS = [[0, 1], [0, -1], [1, 0], [-1, 0], [-1, 1], [1, -1]];

    public static function isNeighbour($a, $b)
    {
        list($x1, $y1) = explode(',', $a);
        list($x2, $y2) = explode(',', $b);
        
        foreach (self::OFFSETS as $offset)
        {
            list($x, $y) = $offset;
            if ($x1 + $x == $x2 && $y1 + $y == $y2)
            {
                return true;
            }
        }

        return false;
    }

    public static function hasNeighBour($a, $board)
    {
        foreach (array_keys($board) as $b)
        {
            if (self::isNeighbour($a, $b))
            {
                return true;
            }
        }
    }

    public static function neighboursAreSameColor($player, $a, $board)
    {
        foreach ($board as $b => $st)
        {
            if (!$st)
            {
                continue;
            }

            $c = $st[count($st) - 1][0];

            if ($c != $player && self::isNeighbour($a, $b))
            {
                return false;
            }
        }
        return true;
    }

    public static function len($tile)
    {
        return $tile ? count($tile) : 0;
    }

    public static function slide($board, $from, $to)
    {
        $result = true;

        if (!self::hasNeighBour($to, $board))
        {
            $result &= false;
        }

        if (!self::isNeighbour($from, $to))
        {
            $result &= false;
        }

        $b = explode(',', $to);
        $common = [];

        foreach (self::OFFSETS as $pq) {
            $p = $b[0] + $pq[0];
            $q = $b[1] + $pq[1];
            if (self::isNeighbour($from, $p.",".$q))
            {
                $common[] = $p.",".$q;
            }
        }

        if (!$board[$common[0]] && !$board[$common[1]] && !$board[$from] && !$board[$to])
        {
            $result &= false;
        }

        if (!$result)
        {
            return false;
        }

        $lenCommon0 = self::len($board[$common[0]]);
        $lenCommon1 = self::len($board[$common[1]]);
        $lenFrom = self::len($board[$from]);
        $lenTo = self::len($board[$to]);

        return min($lenCommon0, $lenCommon1) <= max($lenFrom, $lenTo);
    }
}
