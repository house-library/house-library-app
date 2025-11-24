<?php

namespace App\Controllers\adm;

class Gerenciamento
{
    public function index()
    {
        $data = [
            'title' => 'Gerenciamento',
            'styles' => ['header.css', 'headeradm.css', 'gerenciamento.css'],
        ];

        loadView('adm\gerenciamento', $data);
    }
}
