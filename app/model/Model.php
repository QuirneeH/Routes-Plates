<?php

namespace App\Model;

use App\DataBase\Transaction;

abstract class Model
{
    /**
     * Nome da Tabela a qual foi feita a consulta
     */
    protected static string $table;

    /**
     * Nome do Model que executou a pesquisa
     */
    protected static string $modelName;

    /**
     * ...
     * 
     * @param string $field Coluna em específico para a consulta no banco de dados
     * @param string $value Valor presente no Campo específicado
     * @return void
     */
    public function getID(string $field, string $value): string
    {
        $tableName = static::$table;

        $link = Transaction::connect();
        $result = $link->query("SELECT id_{$tableName} FROM {$tableName} WHERE {$field} = '{$value}' ");
        $id = $result->fetch_assoc();
        $link->close();

        return $id['id_' . $tableName];
    }

    /**
     * Consulta todos os registros presentes em uma tabela no banco de dados\
     * podendo ser todos os campos ou campos específicos
     * 
     * @param string $columns Nome das colunas presentes na tabela
     */
    public function getAll(string $columns = "*"): array
    {
        $tableName = static::$table;
        
        $link = Transaction::connect();
        $result = $link->query("SELECT {$columns} FROM {$tableName}");
        $link->close();

        for($i = 0; $i < $result->num_rows; $i++) 
            $users[$i] = $result->fetch_object(self::$modelName);

        return $users;
    }

    /**
     * Consulta um registro presente no banco atraves dos campos presentes na tabela\ 
     * e seus valores/dados já registrados
     * 
     * @param string $field Coluna em específico para a consulta no banco de dados
     * @param string $value Valor presente no Campo específicado
     * @param string $columns Colunas á serem consultadas presentes na tabela
     */
    public function getBy(string $field, string $value, string $columns = "*"): object
    {
        $tableName = static::$table;
        
        $link = Transaction::connect();
        $result = $link->query("SELECT {$columns} FROM {$tableName} WHERE {$field} = {$value}");
        $link->close();

        return $result->fetch_object(self::$modelName);
    }
}
