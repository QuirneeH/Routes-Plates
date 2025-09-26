<?php

namespace App\Controller;

use App\Core\View;

class ExempleController
{
    /**
     * Renderiza a tela inicial da página Home
     */
    public function index(): void
    {
        View::addInstance('exemple', new ExempleController());

        View::render('exemple', "exemple.template", [
            "title" => "Ínicio"
        ]);
    }

    /**
     * PARA EXEMPLO
     */
    public static function teste(): void
    {
        echo('Texto de uma instancia do ' . __CLASS__);    
    }

    public function readName(string $name)
    {
        View::render('exemple', "name.template", [
            "title" => "Seu Nome",
            "name" => $name
        ]);
    }
}