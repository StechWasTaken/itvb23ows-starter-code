<?php

function getState()
{
    return serialize([$_SESSION['hand'], $_SESSION['board'], $_SESSION['player']]);
}

function setState($state)
{
    list($a, $b, $c) = unserialize($state);
    $_SESSION['hand'] = $a;
    $_SESSION['board'] = $b;
    $_SESSION['player'] = $c;
}

$databaseName = $_ENV['MYSQL_DB_NAME'];
$username = $_ENV['MYSQL_DB_USER'];
$password = $_ENV['MYSQL_DB_PASSWORD'];

return new mysqli('db', $username, $password, $databaseName);
