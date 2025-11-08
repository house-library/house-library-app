<?php

namespace App\Controllers;
use Framework\Database;

class Publicados
{
    public function __construct(private $db) {}

    public function index(): void
    {
        $data = [
            'title' => 'Publicados',
            'styles' => ['publicados.css'],
        ];

        loadView('publicados', $data);
    }
}
