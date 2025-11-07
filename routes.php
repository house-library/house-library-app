<?php

// pagina principal
$router->get('/', 'Home@index');

$router->get('/listings', 'ListingsController@index');
$router->get('/listings/create', 'ListingsController@create');
$router->get('/listing', 'ListingsController@show');
$router->post('/listings', 'ListingsController@store');

// paginas do site
$router->get('/carrinho', 'Carrinho@index');
$router->get('/cadastro', 'Cadastro@index');
$router->get('/conta', 'Conta@index');
$router->get('/detalhes', 'Detalhes@index');
$router->get('/estatisticas', 'Estatisticas@index');
$router->get('/explorar', 'Explorar@index');
$router->get('/favoritos', 'Favoritos@index');
$router->get('/gerenciamento', 'Gerenciamento@index');
$router->get('/historico', 'Historico@index');
$router->get('/login', 'Login@index');
$router->get('/pagamento', 'Pagamento@index');
$router->get('/publicados', 'Publicados@index');
$router->get('/recsenha', 'Recsenha@index');

return $router;
// routes.php
