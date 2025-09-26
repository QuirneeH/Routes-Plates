<?php

namespace App\Core;

use Exception;

class Controller
{
    /**
     * Instacia uma Classe e execulta o Método.
     * Verifica a existencia tanto da Classe quando do Método
     * 
     * @param string $controller Nome do Controller
     * @param string $method Nome do Método
     * @param array $params Parâmetros exigidos pelo Método. Caso campo Nulo será inicializado vazio
     * @throws \Exception
     * @return void
     */
    public function call(string $controller, string $method, array $params = [])
    {
        $controllerNamespace = "App\\Controller\\" . $controller;

        if(!class_exists($controllerNamespace)) 
            throw new Exception("Controller \"<b>{$controllerNamespace}</b>\" não Existe ou não encontrada.", 404);

        //Instancia do controlador
        $controllerInstance = new $controllerNamespace;

        if(!method_exists($controllerInstance, $method))
            throw new Exception("Método \"<b>{$method}</b>\" não foi encontrado no Controller \"<b>{$controllerNamespace}</b>\".", 404);
        
        //Instancia do método
        call_user_func_array([$controllerInstance, $method], $params);
    }
}
