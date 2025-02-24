<?php

namespace App\DataBase;

use Exception;
use mysqli;

abstract class Connection
{
    /**
     * Variável de conexão com o banco de dados
     * @var mysqli $connect
     */
    protected static ?mysqli $connect = null;

    /**
     * Método que inicia uma conexão com o banco de dados
     * e verifica se a conexão foi efetuada com sucesso
     */
    public static function connect(): mysqli {
                                    /**
                                     * "localhost" = Endereço de IP
                                     * "root" = Usuário
                                     * "password" = Senha
                                     * "database" = Nome do Banco de Dados
                                     */
        self::$connect = new mysqli("localhost", "root", "password", "database");

        if(!self::$connect)
            throw new Exception("Erro na conexão com o banco de dados");

        return self::$connect;
    }
}