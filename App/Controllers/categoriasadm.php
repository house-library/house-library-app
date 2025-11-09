<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Database;

class categoriasadm
{
    public function __construct(private Database $db) {}

    public function index(): void
    {
        $data = [
            'title' => 'Criar Categorias',
            'styles' => ['header.css', 'headeradm.css', 'categoriasadm.css'],
            'errors' => [],
            'listing' => [],
        ];

        loadView('categoriasadm', $data);
    }
}
