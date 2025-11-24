<?php

namespace App\Controllers\index;

class Conta
{
    public function index()
    {
        $data = [
            'title' => 'Conta',
            'styles' => ['conta.css'],
        ];

        loadView('index\conta', $data);
    }
}
