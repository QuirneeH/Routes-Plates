<?php

namespace App\Controller;

use App\Core\View;

class HomeController
{
    /**
     * Renderiza a tela inicial da página Home
     */
    public function index(): void
    {
        View::addInstance('home', new HomeController());

        View::render('home/main', [
            "title" => "Ínicio"
        ]);
    }

    /**
     * PARA EXEMPLO
     */
    public static function teste(): void
    {
        echo('Chamada de uma instancia de HomeController');    
    }
}