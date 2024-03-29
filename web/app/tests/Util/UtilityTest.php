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

    public function testUndoMove()
    {
        $db = $this->createMock(mysqli::class);
        $gameId = 1;
        $lastMoveId = 1;

        $result = $db->expects($this->once())
            ->method('prepare')
            ->with('SELECT previous_id FROM moves WHERE game_id = ? AND id = ?')
            ->method('bind_param')
            ->with('ii', $gameId, $lastMoveId)
            ->method('execute')
            ->method('get_result')
            ->method('fetch_array')
            ->willReturn(['previous_id' => 0]);

        $previousId = $result['previous_id'];

        $db->expects($this->once())
            ->method('prepare')
            ->with('DELETE FROM moves WHERE game_id = ? AND id = ?')
            ->method('bind_param')
            ->with('ii', $gameId, $lastMoveId)
            ->method('execute');

        $db->expects($this->once())
            ->method('prepare')
            ->with('SELECT state FROM moves WHERE game_id = ? AND id = ?')
            ->method('bind_param')
            ->with('ii', $gameId, $previousId)
            ->method('execute')
            ->method('get_result')
            ->method('fetch_array')
            ->willReturn(['state' => 'state']);

        $this->assertEquals(['state', $previousId], Utility::undoMove($db, $gameId, $lastMoveId));
    }
}
