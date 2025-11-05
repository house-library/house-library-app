<?php

namespace App\Controllers;

class Estatisticas
{
    public function index()
    {
        $data = [
            'title' => 'Estatisticas',
            'styles' => ['estatisticas.css'],
        ];

        loadView('estatisticas', $data);
    }
}
