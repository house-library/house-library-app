<?php

namespace App\Controllers;

class Cadastro
{
    public function index()
    {
        $data = [
            'title' => 'Cadastro',
            'styles' => ['cadastro.css'],
        ];

        loadView('cadastro', $data);
    }
}
