<?php

namespace App\Controllers\index;

use Framework\Database;
use App\Models\Dao\LivroDao;

class Buscar
{
    private LivroDao $livroDao;

    public function __construct(Database $db)
    {
        $this->livroDao = new LivroDao($db);
    }

    public function index()
    {
        // pega o termo
        $termo = filter_input(
            INPUT_GET,
            'search-input',
            FILTER_SANITIZE_SPECIAL_CHARS,
        );

        if (empty($termo)) {
            header('Location: /');
            exit();
        }

        $resultados = $this->livroDao->buscaPorTermo($termo);

        $categorias = $this->livroDao->listDistinctCategory();

        loadView('index/buscar', [
            'livros' => $resultados,
            'termoBuscado' => $termo,
            'categorias' => $categorias,
            'styles' => ['explorar.css'],
            'tituloPagina' => 'Busca por: ' . $termo,
        ]);
    }
}
