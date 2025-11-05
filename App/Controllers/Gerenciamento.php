<?php

namespace App\Controllers;

class Gerenciamento
{
    public function index()
    {
        $data = [
            'title' => 'Gerenciamento',
            'styles' => ['gerenciamento.css'],
        ];

        loadView('gerenciamento', $data);
    }
}
