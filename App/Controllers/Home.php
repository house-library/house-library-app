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
        // Buscar livros por categoria
        $aventuras = $this->db
            ->query("SELECT * FROM livros WHERE categoria = 'Aventura' LIMIT 6")
            ->fetchAll();

        $infantis = $this->db
            ->query("SELECT * FROM livros WHERE categoria = 'Infantil' LIMIT 6")
            ->fetchAll();

        $classicos = $this->db
            ->query(
                "SELECT * FROM livros WHERE categoria IN ('Romance', 'Ficção Científica') LIMIT 6",
            )
            ->fetchAll();

        $biografias = $this->db
            ->query(
                "SELECT * FROM livros WHERE categoria = 'Biografias' LIMIT 6",
            )
            ->fetchAll();

        $cultura = $this->db
            ->query("SELECT * FROM livros WHERE categoria = 'Cultura' LIMIT 6")
            ->fetchAll();

        $ciencia = $this->db
            ->query(
                "SELECT * FROM livros WHERE categoria = 'Tecnologia' LIMIT 6",
            )
            ->fetchAll();

        $data = [
            'title' => 'Início',
            'styles' => ['inicio.css'],
            'aventuras' => $aventuras,
            'infantis' => $infantis,
            'classicos' => $classicos,
            'biografias' => $biografias,
            'cultura' => $cultura,
            'ciencia' => $ciencia,
        ];

        loadView('home', $data);
    }
}
