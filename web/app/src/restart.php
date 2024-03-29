<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\DatabaseHelper;

$_SESSION['board'] = [];
$_SESSION['hand'] = [
    0 => ["Q" => 1, "B" => 2, "S" => 2, "A" => 3, "G" => 3],
    1 => ["Q" => 1, "B" => 2, "S" => 2, "A" => 3, "G" => 3],
];
$_SESSION['player'] = 0;
$_SESSION['last_move'] = null;

$db = DatabaseHelper::getDatabase();
$db->prepare('INSERT INTO games VALUES ()')->execute();
$_SESSION['game_id'] = $db->insert_id;

header('Location: ../index.php');
