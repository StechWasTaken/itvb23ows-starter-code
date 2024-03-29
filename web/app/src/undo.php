<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\DatabaseHelper;

$db = DatabaseHelper::getDatabase();
$stmt = $db->prepare('SELECT * FROM moves WHERE id = '.$_SESSION['last_move']);
$stmt->execute();
$result = $stmt->get_result()->fetch_array();
$_SESSION['last_move'] = $result[5];
DatabaseHelper::setState($result[6]);
header('Location: ../index.php');
