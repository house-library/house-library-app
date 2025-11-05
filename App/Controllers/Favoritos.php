<?php
// Caminho: App/Controllers/CarrinhoController.php

namespace App\Controllers;

class Favoritos
{
    public function index()
    {
        $data = [
            'title' => 'Favoritos',
            'styles' => ['favoritos.css'],
        ];

        loadView('favoritos', $data);
    }
}
