<?php

use PHPUnit\Framework\TestCase;
use App\Util\Utility;

class UtilityTest extends TestCase
{
    public function testIsNeighbour()
    {
        $cases = [
            true => ['0,1', '1,0', '1,-1', '0,-1', '-1,0', '-1,1'],
            false => ['1,1', '-1,-1', '2,2', '0,2', '2,0', '1,2', '2,-2', '-2,2'],
        ];

        foreach ($cases as $expected => $neighbours) {
            foreach ($neighbours as $neighbour) {
                $this->assertEquals($expected, Utility::isNeighbour('0,0', $neighbour));
            }
        }
    }
}
