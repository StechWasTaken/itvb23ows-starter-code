<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\DatabaseHelper;
use App\Util\Utility;

if (!isset($_SESSION['last_move']))
{
    header('Location: ../index.php');
    exit(0);
}

$db = DatabaseHelper::getDatabase();

$previousMoveId = Utility::getPreviousMove($db, $_SESSION['game_id']);

Utility::undoMove($db, $_SESSION['game_id'], $_SESSION['last_move']);

if ($previousMoveId === null)
{
    header('Location: restart.php');
    exit(0);
}

$_SESSION['last_move'] = $previousMoveId;

$previousState = Utility::getPreviousState($db, $_SESSION['game_id'], $previousMoveId);

DatabaseHelper::setState($previousState);

header('Location: ../index.php');
