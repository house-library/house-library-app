<?php
declare(strict_types=1);

// configura a conexão
$config = require basePath('config/db.php');
$db = new Database($config);

$ciencia = $db
    ->query("SELECT * FROM LIVROS WHERE categoria = 'Ciencia'")
    ->fetchAll();

$data = [
    'title' => 'Todos os Livros',
    'styles' => ['listings.css'],
    'livros' => $ciencia,
];

loadView('ciencia', $data);
