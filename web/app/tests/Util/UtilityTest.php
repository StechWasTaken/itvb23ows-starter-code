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
        $moveId = 1;
        $gameId = 1;

        $db->expects($this->once())
            ->method('prepare')
            ->with('DELETE FROM moves WHERE id = ? AND game_id = ?')
            ->willReturn($stmt = $this->createMock(mysqli_stmt::class));

        $stmt->expects($this->once())
            ->method('bind_param')
            ->with('ii', $moveId, $gameId)
            ->willReturn(true);

        $stmt->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $this->assertTrue(Utility::undoMove($db, $moveId, $gameId));
    }

    public function testGetPreviousMove()
    {
        $db = $this->createMock(mysqli::class);
        $gameId = 1;
        $moveId = 2;
        $previousMoveId = 1;

        $db->expects($this->once())
            ->method('prepare')
            ->with('SELECT previous_id FROM moves WHERE game_id = ? ORDER BY id DESC LIMIT 1')
            ->willReturn($stmt = $this->createMock(mysqli_stmt::class));

        $stmt->expects($this->once())
            ->method('bind_param')
            ->with('i', $gameId)
            ->willReturn(true);

        $stmt->expects($this->once())
            ->method('execute')
            ->willReturn(true); // Assuming execution was successful

        $stmt->expects($this->once())
            ->method('get_result')
            ->willReturn($result = $this->createMock(mysqli_result::class));

        $result->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn(['previous_id' => $previousMoveId]);

        $this->assertEquals($previousMoveId, Utility::getPreviousMove($db, $gameId, $moveId));
    }

    public function testGetPreviousState()
    {
        $db = $this->createMock(mysqli::class);
        $gameId = 1;
        $previousMoveId = 1;
        $state = 'state';

        $db->expects($this->once())
            ->method('prepare')
            ->with('SELECT state FROM moves WHERE game_id = ? AND id = ?')
            ->willReturn($stmt = $this->createMock(mysqli_stmt::class));

        $stmt->expects($this->once())
            ->method('bind_param')
            ->with('ii', $gameId, $previousMoveId)
            ->willReturn(true);

        $stmt->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $stmt->expects($this->once())
            ->method('get_result')
            ->willReturn($result = $this->createMock(mysqli_result::class));

        $result->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn(['state' => $state]);

        $this->assertEquals($state, Utility::getPreviousState($db, $gameId, $previousMoveId));
    }

}
