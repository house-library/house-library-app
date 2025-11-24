<?php

namespace App\Controllers\adm;

class Estatisticas
{
    public function index()
    {
        $data = [
            'title' => 'Estatisticas',
            'styles' => ['estatisticas.css'],
        ];

        loadView('adm\estatisticas', $data);
    }
}
