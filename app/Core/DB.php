<?php


namespace App\Core;


class DB
{
    private static $connection = null;

    public static function getConnection()
    {
        if (is_null(self::$connection)) {
            self::$connection = new \mysqli('localhost', 'homestead', 'secret', 'tms', '3306');
        }

        return self::$connection;
    }
}