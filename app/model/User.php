<?php

namespace App\Model;

use App\DataBase\Transaction;

class User extends Model
{
    //Colunas
    public readonly string $id_usuario;
    public readonly string $nome;
    public readonly string $sobrenome;
    public readonly string $apelido;
    public readonly string $email;
    public readonly string $senha;
    public readonly string $criado_em;
    public readonly string $atualizado_em;

    public function __construct()
    {
        self::$table = "usuario";
        self::$modelName = __CLASS__;
    }
}
