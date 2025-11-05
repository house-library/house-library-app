<?php
// Caminho: App/Controllers/CarrinhoController.php

namespace App\Controllers;

class Publicados
{
    public function index()
    {
        $data = [
            'title' => 'Publicados',
            'styles' => ['publicados.css'],
        ];

        loadView('publicados', $data);
    }
}
