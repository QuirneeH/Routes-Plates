<?php

use App\Core\Router;

$router = new Router();
try{
//  $router->add('/apiUri', 'GET', 'apiController::apiMethod');
//  $router->init();
} catch(Exception $e) {
    print_r($e->getMessage());
}
