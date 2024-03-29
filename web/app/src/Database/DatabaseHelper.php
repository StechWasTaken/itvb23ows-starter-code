<?php

namespace App\Database;

use mysqli;

class DatabaseHelper
{
    private static $db = null;
    private const HOST = 'db';

    public static function getDatabase()
    {
        if (self::$db === null)
        {
            $databaseName = $_ENV['MYSQL_DB_NAME'];
            $username = $_ENV['MYSQL_DB_USER'];
            $password = $_ENV['MYSQL_DB_PASSWORD'];

            self::$db = new mysqli(self::HOST, $username, $password, $databaseName);
        }

        return self::$db;
    }

    public static function getState()
    {
        return serialize([$_SESSION['hand'], $_SESSION['board'], $_SESSION['player']]);
    }

    public static function setState($state)
    {
        list($a, $b, $c) = unserialize($state);
        $_SESSION['hand'] = $a;
        $_SESSION['board'] = $b;
        $_SESSION['player'] = $c;
    }
}
