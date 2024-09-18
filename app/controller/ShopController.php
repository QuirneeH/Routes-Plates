<?php

namespace App\Controller;

use App\Core\View;

class ShopController
{
    /**
     * Renderiza a tela inicial da página Shop
     */
    public function index(): void
    {
        View::render('shop/main', [
            'title' => "SHOP"
        ]);    
    }

    /**
     * PARA TESTE
     */
    public function buy(): void
    {
        echo("Compra em R$15.999,90 efetuada com <b style='color: green;'>sucesso</b>");    
    }
}