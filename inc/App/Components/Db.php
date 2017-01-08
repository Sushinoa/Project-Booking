<?php
namespace App\Components;

use PDO;

class Db
{
    protected static $connection;

    public static function getConnection()
    {
        if (null !== static::$connection) {
            return static::$connection;
        }
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=localhost;dbname=booking;}";
        $db = new PDO($dsn,$user,$pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ));
        $query = 'SET CHARSET utf8';
        $db->query ( $query );
        return  static::$connection = $db;
    }

}
