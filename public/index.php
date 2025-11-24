<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../helpers.php';

use Framework\Router;
use Framework\Database;

// Istancia a rota
$router = new Router();

// ligação com as rotas
require basePath('routes.php');

// ligação com URI e metodo HTTP
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$config = require basePath('config/db.php');
try {
    $db = new Database($config);
} catch (Exception $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    exit();
}

// Passa os dados para rotear a solicitação
$router->route($uri, $db);
