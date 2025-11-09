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
        $aventuras = $this->db
            ->query(
                "
                SELECT L.* 
                FROM LIVROS L
                INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE C.descricao = 'Aventura' 
                AND C.status = 'A'
                LIMIT 6
            ",
            )
            ->fetchAll();

        $infantis = $this->db
            ->query(
                "
                SELECT L.* 
                FROM LIVROS L
                INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE C.descricao = 'Infantil' 
                AND C.status = 'A'
                LIMIT 6
            ",
            )
            ->fetchAll();

        $classicos = $this->db
            ->query(
                "
                SELECT L.* 
                FROM LIVROS L
                INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE C.descricao IN ('Romance', 'Ficção Científica') 
                AND C.status = 'A'
                LIMIT 6
            ",
            )
            ->fetchAll();

        $biografias = $this->db
            ->query(
                "
                SELECT L.* 
                FROM LIVROS L
                INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE C.descricao = 'Biografias' 
                AND C.status = 'A'
                LIMIT 6
            ",
            )
            ->fetchAll();

        $cultura = $this->db
            ->query(
                "
                SELECT L.* 
                FROM LIVROS L
                INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE C.descricao = 'Cultura' 
                AND C.status = 'A'
                LIMIT 6
            ",
            )
            ->fetchAll();

        $ciencia = $this->db
            ->query(
                "
                SELECT L.* 
                FROM LIVROS L
                INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE C.descricao = 'Ciência' 
                AND C.status = 'A'
                LIMIT 6
            ",
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
