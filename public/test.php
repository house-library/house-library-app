<?php
require __DIR__ . '/../vendor/autoload.php';

// Força o Composer a tentar carregar a classe
if (class_exists('App\Controllers\CategoriasAdm')) {
    echo '✅ Classe EXISTE e foi carregada!';
} else {
    echo '❌ Classe NÃO encontrada pelo autoloader.';
}
