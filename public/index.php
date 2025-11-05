<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../helpers.php';

use Framework\Router;

// Istancia a rota
$router = new Router();

// ligação com as rotas
require basePath('routes.php');

// ligação com URI e metodo HTTP
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Passa os dados para rotear a solicitação
$router->route($uri, $method);
