<?php
declare(strict_types=1);

// configura a conexão
$config = require basePath('config/db.php');
$db = new Database($config);

$biografias = $db
    ->query("SELECT * FROM LIVROS WHERE categoria = 'Biografias'")
    ->fetchAll();

$data = [
    'title' => 'Todos os Livros',
    'styles' => ['listings.css'],
    'livros' => $biografias,
];

loadView('biografias', $data);
