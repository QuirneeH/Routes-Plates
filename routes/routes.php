<?php

use App\Core\Router;

$router = new Router();
try{
    $router->add('/', 'GET', 'HomeController::index');
    $router->add('/shop', 'GET', 'ShopController::index');
    $router->init();
} catch(Exception $e) {
    print_r($e->getMessage());
}
