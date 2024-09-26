<?php

namespace App\Core;

use Exception;

class Controller
{
    /**
     * Instancia a classe e executa o método referente a rota e o tipo de requisição
     * 
     * @param Route $route Todas as rotas registradas
     */
    public function call(Route $route): void
    {
        $controller = $route->controller;

        if(!str_contains($controller, ':'))
            throw new Exception("Ta sem dois ponto", 505);

        [$controller, $method] = explode('::', $controller);

        $controllerNamespace = "App\\Controller\\" . $controller;

        if(!class_exists($controllerNamespace)) 
            throw new Exception("Controller \"<b>{$controllerNamespace}</b>\" não Existe", 404);

        //Instancia do controlador
        $controllerInstance = new $controllerNamespace;

        if(!method_exists($controllerNamespace, $method)) 
            throw new Exception("Controller \"<b>{$controllerNamespace}</b>\" sem o método \"{$method}\"", 404);

        //Instancia do método
        call_user_func_array([$controllerInstance, $method], []);
    }
}
