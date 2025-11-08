<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class Listings
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index(): void
    {
        $livros = $this->db->query('SELECT * FROM livros')->fetchAll();

        $data = [
            'title' => 'Início',
            'styles' => ['inicio.css'],
            'livros' => $livros,
        ];

        loadView('home', $data);
    }

    public function create(): void
    {
        loadView('gerenciamento', [
            'listing' => [],
            'styles' => ['gerenciamento.css'],
        ]);
    }

    public function show($params): void
    {
        $id = $params['id'] ?? '';
        $params = ['id' => $id];

        $livro = $this->db
            ->query('SELECT * FROM livros WHERE livros_id = :id', $params)
            ->fetch();

        if (!$livro) {
            Error::notFound('404 Não Encontrado');
            return;
        }

        $livrosRelacionados = $this->db
            ->query(
                'SELECT * FROM livros 
             WHERE categoria = :categoria 
             AND livros_id != :id 
             LIMIT 4',
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

        loadView('detalhes', $data);
    }

    public function store()
    {
        $allowedFields = [
            'titulo',
            'nome_autor',
            'categoria',
            'ano_lancamento',
            'preco',
            'idioma',
            'sinopse',
            'descricao',
            'faixa_etaria',
        ];

        $newListingData = array_intersect_key(
            $_POST,
            array_flip($allowedFields),
        );
        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = [
            'titulo',
            'nome_autor',
            'categoria',
            'ano_lancamento',
            'preco',
            'idioma',
            'sinopse',
            'descricao',
        ];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (
                empty($newListingData[$field]) ||
                !Validation::string($newListingData[$field])
            ) {
                $errors[$field] = ucfirst($field) . ' é obrigatório';
            }
        }

        if (
            !empty($newListingData['ano_lancamento']) &&
            !is_numeric($newListingData['ano_lancamento'])
        ) {
            $errors['ano_lancamento'] = 'Ano deve ser numérico';
        }

        if (
            !empty($newListingData['preco']) &&
            !is_numeric($newListingData['preco'])
        ) {
            $errors['preco'] = 'Preço deve ser numérico';
        }

        if (!empty($errors)) {
            loadView('gerenciamento', [
                'errors' => $errors,
                'listing' => $newListingData,
                'styles' => ['gerenciamento.css'],
            ]);
            return;
        }

        $fields = [];
        $values = [];

        // Insert
        $fields = implode(', ', array_keys($newListingData));
        $values = ':' . implode(', :', array_keys($newListingData));

        $query = "INSERT INTO livros ($fields) VALUES ($values)";
        $this->db->query($query, $newListingData);

        redirect('/listings');
    }

    public function destroy($params)
    {
        $id = $params['id'] ?? '';
        $params = ['id' => $id];

        $livro = $this->db
            ->query('SELECT * FROM livros WHERE livros_id = :id', $params)
            ->fetch();

        if (!$livro) {
            Error::notFound('Não encontrado');
            return;
        }

        $this->db->query('DELETE FROM livros WHERE livros_id = :id', $params);

        redirect('/listings');
    }

    public function edit($params)
    {
        $id = $params['id'] ?? '';
        $params = ['id' => $id];

        $livro = $this->db
            ->query('SELECT * FROM livros WHERE livros_id = :id', $params)
            ->fetch();

        if (!$livro) {
            Error::notFound('404 Não Encontrado');
            return;
        }

        loadView('gerenciamento', ['listing' => $livro]);
    }
}
