<?php

namespace App\Lib;

use PDO;
use PDOException;
use Exception;

class Conexao
{
    private static $connection = null;

    private function __construct()
    {
        
    }

    public static function getConnection()
    {

        $driver = "mysql";
        $host = "localhost";
        $db_name = "devmedia";
        $pdoConfig = $driver . ":" . "host=" . $host . ";";
        $pdoConfig .= "dbname=" . $db_name . ";";
        $usuario = "root";
        $senha = "root";

        try {
            if (self::$connection === null) {
                self::$connection = new PDO($pdoConfig, $usuario, $senha);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão com o banco de dados", 500);
        }

        return self::$connection;
    }
}