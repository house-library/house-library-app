'<?php
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

// Páginas do site (usuario)
$router->get('/carrinho', 'Carrinho@index');
$router->get('/cadastro', 'Cadastro@index');
$router->get('/conta', 'Conta@index');
$router->get('/detalhes', 'Detalhes@index');
$router->get('/explorar', 'Explorar@index');
$router->get('/login', 'Login@index');
$router->get('/pagamento', 'Pagamento@index');
$router->get('/recsenha', 'Recsenha@index');
$router->get('/favoritos', 'Favoritos@index');
$router->get('/historico', 'Historico@index');

// Páginas do site (adm)
$router->get('/estatisticas', 'Estatisticas@index');
$router->get('/gerenciamento', 'Listings@create');
$router->get('/publicados', 'Publicados@index');
$router->get('/administradores', 'administradores@index');

// Rotas para Categorias
$router->get('/categoriasadm', 'categoriasadm@index');
$router->post('/categoriasadm', 'categoriasadm@store');
$router->get('/categoriasadm/create', 'categoriasadm@create'); // Novo
$router->get('/categoriasadm/edit/{id}', 'categoriasadm@edit'); // Editar
$router->delete('/categoriasadm/{id}', 'categoriasadm@destroy'); // Excluir
$router->get('/categoriasadm/{id}/status', 'categoriasadm@toggleStatus');

// Rotas para Usuarios
$router->get('/clientes', 'Clientes@index');
$router->delete('/clientes/{id}', 'Clientes@destroy'); // Excluir
$router->post('/clientes', 'Clientes@handlePost');

return $router;

