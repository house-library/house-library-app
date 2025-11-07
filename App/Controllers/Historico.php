<?php
// Caminho: App/Controllers/CarrinhoController.php

namespace App\Controllers;

class Historico
{
    public function index()
    {
        $data = [
            'title' => 'Historico',
            'styles' => ['historico.css'],
        ];

        loadView('historico', $data);
    }
}
