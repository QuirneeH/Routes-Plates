<?php

namespace App\DataBase;

use Exception;
use mysqli;

class Connection
{
    private static ?mysqli $connect = null;

    /**
     * Método que inicia uma conexão com o banco de dados
     */
    public static function connect() : mysqli {
        self::$connect = new mysqli("localhost", "root", "", "vendas");

        if(!self::$connect) {
            throw new Exception("Erro na conexão com o banco de dados");
        }

        return self::$connect;
    }
}