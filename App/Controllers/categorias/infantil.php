<?php
declare(strict_types=1);

// configura a conexão
$config = require basePath('config/db.php');
$db = new Database($config);

$infantil = $db
    ->query("SELECT * FROM LIVROS WHERE categoria = 'Infantis'")
    ->fetchAll();

$data = [
    'title' => 'Todos os Livros',
    'styles' => ['listings.css'],
    'livros' => $infantil,
];

loadView('infantil', $data);
