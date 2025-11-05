<?php

namespace App\Controllers;

class Explorar
{
    public function index()
    {
        $data = [
            'title' => 'Explorar',
            'styles' => ['explorar.css'],
        ];

        loadView('explorar', $data);
    }
}
