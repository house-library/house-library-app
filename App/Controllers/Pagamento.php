<?php
// Caminho: App/Controllers/CarrinhoController.php

namespace App\Controllers;

class Pagamento
{
    public function index()
    {
        $data = [
            'title' => 'Pagamento',
            'styles' => ['pagamento.css'],
        ];

        loadView('pagamento', $data);
    }
}
