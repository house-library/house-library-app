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

        $itensPorPagina = 24;
        $paginaAtual = filter_input(INPUT_GET, 'pg', FILTER_VALIDATE_INT) ?? 1;
        if ($paginaAtual < 1) $paginaAtual = 1;
        
        $offset = ($paginaAtual - 1) * $itensPorPagina;

        
        $resultados = $this->livroDao->buscaPorTermoPaginada($termo, $itensPorPagina, $offset);
        
        $totalLivros = $this->livroDao->contarBuscaPorTermo($termo);

         if ($totalLivros === 0) {
            header('Location: /404');
            exit();
        }

        $totalPaginas = ceil($totalLivros / $itensPorPagina);

        loadView('index/buscar', [
            'livros' => $resultados,
            'termoBuscado' => $termo,
            'categorias' => $categorias,
            'styles' => ['buscar.css', 'pagination.css'],
            'paginaAtual' => $paginaAtual,
            'totalPaginas' => $totalPaginas,

        ]);
    }
}
