<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $livros = $this->db->query('SELECT * FROM listings')->fetchAll();

        $data = [
            'title' => 'Início',
            'styles' => ['inicio.css'],
            'livros' => $livros,
        ];

        loadView('home', $data);
    }

    public function create()
    {
        loadView('listings/create');
    }

    public function show($params)
    {
        $id = $params['id'] ?? '';

        $config = require basePath('config/db.php');
        $db = new Database($config);

        $params = ['id' => $id];

        // Buscar o livro principal
        $livro = $db
            ->query('SELECT * FROM livros WHERE livros_id = :id', $params)
            ->fetch();

        // Buscar livros relacionados (mesma categoria, excluindo o atual)
        $livrosRelacionados = $db
            ->query(
                'SELECT * FROM livros 
     WHERE categoria = :categoria 
     AND livros_id != :id 
     ORDER BY RAND() 
     LIMIT 10',
                [
                    'categoria' => $livro['categoria'],
                    'id' => $id,
                ],
            )
            ->fetchAll();

        $data = [
            'title' => $livro['titulo'],
            'styles' => ['detalhes.css'],
            'livro' => $livro,
            'livrosRelacionados' => $livrosRelacionados,
        ];

        if (!$listing) {
            ErrorController::notFound('404 Não Encontrado');
            return;
        }

        loadView('listings/show', $data);
    }

    public function store()
    {
        $allowedFields = [];

        $newListingData = array_intersect_key(
            $_POST,
            array_flip($allowedFields),
        );

        $newListingData['user_id'] = 1;
        $newListingData = array_map('sanitize', $newListingData);
    }
}
