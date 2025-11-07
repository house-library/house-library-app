<?php

namespace App\Controllers;

class Conta
{
    public function index()
    {
        $data = [
            'title' => 'Conta',
            'styles' => ['conta.css'],
        ];

        loadView('conta', $data);
    }
}
