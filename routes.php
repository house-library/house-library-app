<?php
use Framework\Router;

$router = new Router();

// Página principal
$router->get('/', 'index\Home@index');

// paginas de erro
$router->get('/403', 'error\Error403@index');
$router->get('/404', 'error\Error404@index');
$router->get('/error', 'error\Error@index');

// Login
$router->get('/login', 'registro\Login@index');
$router->post('/login', 'registro\Login@store');
$router->get('/logout', 'registro\Login@destroy');

// cadastro
$router->get('/cadastro', 'registro\Cadastro@index');
$router->get('/cadastro', 'registro\Cadastro@index');
$router->post('/cadastro/store', 'registro\Cadastro@store');
$router->post('/cadastro/validar', 'registro\Cadastro@validar');

// recuperar senha
$router->get('/recsenha', 'registro\Recsenha@index');
$router->post('/recsenha', 'registro\Recsenha@update');

// Páginas do site (usuario)
$router->get('/conta', 'index\Conta@index');
$router->get('/detalhes', 'index\Detalhes@index');
$router->get('/explorar', 'index\Explorar@index');
$router->get('/historico', 'index\Historico@index');
$router->get('/buscar', 'index\Buscar@index');

// pagamento
$router->get('/pagamento', 'compra\Pagamento@index');
$router->post('/pagamento/finalizar', 'compra\Pagamento@finalizar');
$router->get('/boleto/visualizar', 'compra\Boleto@visualizar');

// crud de favoritos
$router->get('/favoritos', 'index\Favoritos@index');
$router->get('/favoritos/add', 'index\Favoritos@add');
$router->get('/favoritos/remover', 'index\Favoritos@remove');

// crud de carrinho
$router->get('/carrinho', 'compra\Carrinho@index');
$router->get('/carrinho/add', 'compra\Carrinho@add');
$router->get('/carrinho/remover', 'compra\Carrinho@remove');
$router->get('/carrinho/limpar', 'compra\Carrinho@clear');

// Páginas do site (adm)
$router->get('/estatisticas', 'adm\Estatisticas@index');
$router->get('/gerenciamento', 'adm\Listings@create');
$router->get('/publicados', 'adm\Publicados@index');

// CRUD dos livros
$router->get('/listings/create', 'adm\Listings@create');
$router->post('/listings', 'adm\Listings@store');
$router->put('/listings/{id}', 'adm\Listings@update');
$router->delete('/listings/{id}', 'adm\Listings@destroy');
$router->get('/listings/edit/{id}', 'adm\Listings@edit');

// crud de Categorias
$router->get('/categoriasadm', 'adm\categoriasadm@index');
$router->post('/categoriasadm', 'adm\categoriasadm@store');
$router->get('/categoriasadm/create', 'adm\categoriasadm@create'); // Novo
$router->get('/categoriasadm/edit/{id}', 'adm\categoriasadm@edit'); // Editar
$router->delete('/categoriasadm/{id}', 'adm\categoriasadm@destroy'); // Excluir
$router->get('/categoriasadm/{id}/status', 'adm\categoriasadm@toggleStatus');

// crud de usuarios
$router->get('/clientes', 'adm\Clientes@index');
$router->delete('/clientes/{id}', 'adm\Clientes@destroy');

return $router;
