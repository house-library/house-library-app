<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/helpers.php'; // <<< ADICIONE ESTA LINHA AQUI!!!

use Framework\Database;
use App\Models\Dao\CategoriaDao; // Importa CategoriaDao (maiúscula)
use App\Services\CategoriaService;

// Tente carregar a classe explicitamente (isso pode gerar um erro mais claro se falhar)
if (!class_exists('App\Models\Dao\CategoriaDao')) {
    echo "DEBUG: A classe App\Models\Dao\CategoriaDao NÃO foi encontrada pelo autoloader.\n";
    echo "DEBUG: Tentando incluir o arquivo manualmente...\n";
    $possiblePath = __DIR__ . '/App/Models/Dao/CategoriaDao.php';
    if (file_exists($possiblePath)) {
        echo "DEBUG: Arquivo $possiblePath existe.\n";
        // Incluir manualmente pode ajudar a identificar erros de sintaxe
        require_once $possiblePath;
        echo "DEBUG: Arquivo incluído manualmente. Tentando instanciar...\n";
    } else {
        echo "DEBUG: Arquivo $possiblePath NÃO existe.\n";
    }
} else {
    echo "DEBUG: A classe App\Models\Dao\CategoriaDao foi encontrada pelo autoloader.\n";
}

try {
    $config = require __DIR__ . '/config/db.php';
    $db = new Database($config);

    $dao = new CategoriaDao($db); // <-- Instancia CategoriaDao (maiúscula)
    $service = new CategoriaService($dao);

    // Teste 1: Listar categorias
    echo "=== LISTANDO CATEGORIAS ===\n";
    $categorias = $dao->listAll();
    foreach ($categorias as $cat) {
        echo "ID: {$cat->categoria_id} - {$cat->descricao} - Status: {$cat->status}\n";
    }

    // Teste 2: Adicionar categoria (comentado para evitar duplicatas no teste)
    // echo "\n=== ADICIONANDO CATEGORIA ===\n";
    // $dados = [
    //     'descricao' => 'Teste',
    //     'status' => 'A',
    // ];

    // if ($service->adicionarCategoria($dados)) {
    //     echo "✅ Categoria adicionada com sucesso!\n";
    // }

    // Teste 3: Listar novamente
    echo "\n=== LISTANDO NOVAMENTE ===\n";
    $categorias = $dao->listAll();
    foreach ($categorias as $cat) {
        echo "ID: {$cat->categoria_id} - {$cat->descricao} - Status: {$cat->status}\n";
    }

    echo "\n✅ TODOS OS TESTES PASSARAM!\n";
} catch (Exception $e) {
    echo '❌ ERRO: ' . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
