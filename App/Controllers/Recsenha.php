<?php

namespace App\Controllers;

class Recsenha
{
    public function index()
    {
        $data = [
            'title' => 'Recuperação de senha',
            'styles' => ['recsenha.css'],
        ];

        loadView('recsenha', $data);
    }
}
