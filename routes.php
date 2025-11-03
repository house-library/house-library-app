<?php

$router->get('/', 'controllers/home.php');

// Páginas principais do usuário
$router->get('/favoritos', 'controllers/favoritos.php');
$router->get('/carrinho', 'controllers/carrinho.php');
$router->get('/explorar', 'controllers/explorar.php');
$router->get('/conta', 'controllers/conta.php');
$router->get('/detalhes', 'controllers/detalhes.php');
$router->get('/recsenha', 'controllers/recsenha.php');
$router->get('/publicados', 'controllers/publicados.php');
$router->get('/gerenciamento', 'controllers/gerenciamento.php');

// Categorias de livros (visualização pública)
$router->get('/aventuras', 'controllers/categorias/aventuras.php');
$router->get('/infantis', 'controllers/categorias/infantis.php');
$router->get(
    '/literatura-classica',
    'controllers/categorias/literatura-classica.php',
);
$router->get('/biografias', 'controllers/categorias/biografias.php');
$router->get('/cultura', 'controllers/categorias/cultura.php');
$router->get('/ciencia', 'controllers/categorias/ciencia.php');

// Login e Cadastro
$router->get('/login', 'controllers/login.php');
$router->post('/login', 'controllers/login.php');
$router->get('/cadastro', 'controllers/cadastro.php');
$router->post('/cadastro', 'controllers/cadastro.php');

// Pagamento
$router->get('/pagamento', 'controllers/pagamento.php');
$router->post('/pagamento', 'controllers/pagamento.php');

// Páginas institucionais
$router->get('/sobre-nos', 'controllers/sobre-nos.php');
$router->get('/trabalhe-conosco', 'controllers/trabalhe-conosco.php');
$router->get('/devolucoes', 'controllers/devolucoes.php');

$router->get('/historico', 'controllers/historico.php');

// ==========================================
// ROTAS ADMINISTRATIVAS
// ==========================================

$router->get('/listings', 'controllers/listings/index.php');

$router->get('/listings/create', 'controllers/listings/create.php');

// Painel de estatísticas
$router->get('/estatisticas', 'controllers/estatisticas.php');
$router->get('/admin/painel', 'controllers/estatisticas.php');

return $router;
