<?php

namespace App\Core;

class Router
{
    /** 
     * Lista de rotas a serem adicionadas
     */
    private array $routes = [];

    /**
     * Registra uma nova rota
     * 
     * @param string $uri URI da página
     * @param string $request Tipo de requisição (*GET*, *POST*, *PUT*, *DELETE*)
     * @param string $controller Controlador e método a executar { '*Controller:method*' }
     */
    public function add(string $uri, string $request, string $controller): void
    {
        $this->routes[] = new Route($uri, $request, $controller);
    }

    /**
     * Inicia as rotas já adicionadas anteriormente
     */
    public function init()
    {
        foreach($this->routes as $route) {
            if($route->match()) return (new Controller())->call($route);
        }
    }
}