<?php

namespace App\Controller;

use App\Core\View;

class HomeController
{
    /**
     * Renderiza a tela inicial da página Home
     */
    public function index(array $params = []): void
    {
        View::render('home/main', [
            "title" => "Ínicio"
        ]);
    }

    /**
     * PARA TESTE
     */
    public function teste(): void
    {
        echo('Chamada de uma instancia de HomeController');    
    }
}