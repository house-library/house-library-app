<?php

namespace App\Controllers;

class Detalhes
{
    public function index()
    {
        $data = [
            'title' => 'Detalhes',
            'styles' => ['detalhes.css'],
        ];

        loadView('detalhes', $data);
    }
}
