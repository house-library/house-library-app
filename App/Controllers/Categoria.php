<?php

namespace App\Controllers;

class categoria
{
    public function index()
    {
        $data = [
            'title' => 'Categoria',
            'styles' => ['categoria.css'],
        ];

        loadView('categoria', $data);
    }
}
