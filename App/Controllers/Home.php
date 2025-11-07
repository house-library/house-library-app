<?php

namespace App\Controllers;

use Framework\Database;

class Home
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $livros = $this->db->query('SELECT * FROM LIVROS')->fetchAll();

        $data = [
            'title' => 'Início',
            'styles' => ['inicio.css'],
            'livros' => $livros,
        ];

        loadView('home', $data);
    }
}
