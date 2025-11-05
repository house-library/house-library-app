<?php
declare(strict_types=1);

// configura a conexão
$config = require basePath('config/db.php');
$db = new Database($config);

$aventuras = $db
    ->query("SELECT * FROM LIVROS WHERE categoria = 'Aventuras'")
    ->fetchAll();

$data = [
    'title' => 'Todos os Livros',
    'styles' => ['listings.css'],
    'livros' => $aventuras,
];

loadView('aventuras', $data);
