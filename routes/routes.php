<?php

use App\Core\Router;

// Objeto Router
$router = new Router();
try{
    $router->group("", "ExempleController", function() use ($router) {
        $router->add("", "index");
        $router->add("{name}", "readName");
    });
    // Adição de uma rota
    $router->add('/', 'index', 'ExempleController');

    // Inicialização das rotas adicionadas
    $router->init();
} catch(Exception $e) {
    print_r($e->getMessage());
}
