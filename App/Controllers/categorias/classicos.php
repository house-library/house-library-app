<?php
declare(strict_types=1);

// configura a conexão
$config = require basePath('config/db.php');
$db = new Database($config);

$classicos = $db
    ->query("SELECT * FROM LIVROS WHERE categoria = 'Literatura Classica'")
    ->fetchAll();

$data = [
    'title' => 'Todos os Livros',
    'styles' => ['listings.css'],
    'livros' => $classicos,
];

loadView('classicos', $data);
