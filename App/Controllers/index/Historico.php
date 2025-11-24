<?php

namespace App\Controllers\index;

class Historico
{
    public function index()
    {
        $data = [
            'title' => 'Historico',
            'styles' => ['historico.css'],
        ];

        loadView('index\historico', $data);
    }
}
