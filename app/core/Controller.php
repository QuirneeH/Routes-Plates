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

        if(!str_contains($controller, '::'))
            throw new Exception("Informe o metodo com dois pontos. <b>Exemplo: \"ControllerName::MethodName\".", 505);

        $result = mb_strstr($controller, "::");
        
        if(mb_strlen($result) <= 2)
            throw new Exception("Método não informado.", 505);

        [$controller, $method] = explode('::', $controller);

        $controllerNamespace = "App\\Controller\\" . $controller;

        if(!class_exists($controllerNamespace)) 
            throw new Exception("Controller \"<b>{$controllerNamespace}</b>\" não Existe.", 404);

        //Instancia do controlador
        $controllerInstance = new $controllerNamespace;

        if(!method_exists($controllerInstance, $method))
            throw new Exception("Método \"<b>{$method}</b>\" não foi encontrado no Controller \"<b>{$controllerNamespace}</b>\".", 404);
            
        //Instancia do método
        call_user_func_array([$controllerInstance, $method], []);
    }
}
