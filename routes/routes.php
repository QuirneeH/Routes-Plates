<?php

use App\Core\Router;

$router = new Router();
try{
    $router->add('/', 'GET', 'ExempleController::index');
    $router->init();
} catch(Exception $e) {
    print_r($e->getMessage());
}
