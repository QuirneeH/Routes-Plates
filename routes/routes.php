<?php

use App\Core\Router;

// Objeto Router
$router = new Router();
try{
    /**
     * Adição de um Grupo
     * $router->group("", "ExempleController", function() use ($router) {
     *    $router->add("", "index");
     *    $router->add("{name}", "readName");
     * });
     */

    $router->group("", "ExempleController", function() use ($router) {
        $router->add("", "index");
        $router->add("{name}", "readName");
    });

    /**
     * Adição de uma Rota
     * $router->add('/', 'index', 'ExempleController');
     */

    // Inicialização das rotas adicionadas
    $router->init();
} catch(Exception $e) {
    print_r($e->getMessage());
}
