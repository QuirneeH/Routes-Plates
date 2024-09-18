<?php

namespace App\DataBase;

use mysqli;

class Transaction
{
    private static ?mysqli $connect = null;

    /**
     * Inicia uma transação para o banco de dados
     */
    public static function begin()
    {
        self::$connect = Connection::connect();
        self::$connect->begin_transaction();
    }

    /**
     * Interrompe a execução de transação e cancela as transações já ocorridas
     */
    public static function rollback()
    {
        if(self::$connect) {
            self::$connect->rollback();
            self::$connect = null;
        }
    }

    /**
     * Finaliza as transações *mysql* que foram executadas
     */
    public static function commit()
    {
        if(self::$connect) {
            self::$connect->commit();
            self::$connect = null;
        }
    }
}
