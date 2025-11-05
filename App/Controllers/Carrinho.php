<?php

namespace App\Controllers;

class Carrinho
{
    public function index()
    {
        $data = [
            'title' => 'Carrinho',
            'styles' => ['carrinho.css'],
        ];

        loadView('carrinho', $data);
    }
}
