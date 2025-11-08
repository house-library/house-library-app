<?php

use Framework\Router;

$router = new Router();

// Página principal
$router->get('/', 'Home@index');

$router->get('/listings', 'Listings@index');
$router->get('/listings/{id}', 'Listings@show');

// CRUD routes
$router->get('/listings/create', 'Listings@create');
$router->post('/listings', 'Listings@store');
$router->put('/listings/{id}', 'Listings@update');
$router->delete('/listings/{id}', 'Listings@destroy');
$router->get('/listings/edit/{id}', 'Listings@edit');

// Páginas do site
$router->get('/carrinho', 'Carrinho@index');
$router->get('/cadastro', 'Cadastro@index');
$router->get('/conta', 'Conta@index');
$router->get('/detalhes', 'Detalhes@index');
$router->get('/estatisticas', 'Estatisticas@index');
$router->get('/explorar', 'Explorar@index');
$router->get('/favoritos', 'Favoritos@index');
$router->get('/gerenciamento', 'Listings@create');
$router->get('/historico', 'Historico@index');
$router->get('/login', 'Login@index');
$router->get('/pagamento', 'Pagamento@index');
$router->get('/publicados', 'Publicados@index');
$router->get('/recsenha', 'Recsenha@index');
$router->get('/categoria', 'Categoria@index');


return $router;
