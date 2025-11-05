<?php

namespace App\Controllers;

use Framework\Database;

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

    public function show()
    {
        $id = $_GET['id'] ?? '';

        $config = require basePath('config/db.php');
        $db = new Database($config);

        // Verifica se o ID é válido (número)
        if (empty($id) || !ctype_digit($id)) {
            // Redireciona ou mostra erro 404 se o ID for inválido
            loadView('error', ['message' => 'Livro não encontrado.']);
            exit();
        }

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

        loadView('listings/show', $data);
    }
}
