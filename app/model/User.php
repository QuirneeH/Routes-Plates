<?php

namespace App\Model;

use App\DataBase\Transaction;

class User extends Model
{
    //Nome das Colunas

    // public readonly string $id_usuario;
    // public readonly string $nome;
    // public readonly string $sobrenome;
    // public readonly string $apelido;
    // public readonly string $email;
    // public readonly string $senha;
    // public readonly ?string $criado_em;
    // public readonly ?string $atualizado_em;

    /**
     * Ao instanciar define a tabela
     * referente esse Model
     */
    public function __construct()
    {
    //     self::$table = "usuario";
    //     self::$modelName = __CLASS__;
    }
}
