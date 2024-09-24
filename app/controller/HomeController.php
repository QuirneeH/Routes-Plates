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
        $stmt = new \App\Model\User();
        $user = $stmt->getBy("id_usuario", "1", "apelido");
        
        View::render('home/main', [
            "title" => "Ínicio",
            "user" => $user
        ]);
    }

    /**
     * PARA TESTE
     */
    public static function teste(): void
    {
        echo('Chamada de uma instancia de HomeController');    
    }
}