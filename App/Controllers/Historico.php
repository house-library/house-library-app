<?php

namespace App\Controllers;

class categoriasAdm
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
