<?php

namespace App\Controllers;

class Gerenciamento
{
    public function index()
    {
        $data = [
            'title' => 'Gerenciamento',
            'styles' => ['header.css', 'headeradm.css', 'gerenciamento.css'],
        ];

        loadView('gerenciamento', $data);
    }
}
