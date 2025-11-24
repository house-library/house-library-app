<?php

namespace App\Controllers\index;

use Framework\Database;
use App\Models\Dao\LivroDao;

class Explorar
{
    private LivroDao $livroDao;

    public function __construct(Database $db)
    {
        $this->livroDao = new LivroDao($db);
    }

    public function index()
    {
        $itensPorPagina = 24;

        // Pega a página atual da URL
        $paginaAtual = filter_input(INPUT_GET, 'pg', FILTER_VALIDATE_INT) ?? 1;
        if ($paginaAtual < 1) {
            $paginaAtual = 1;
        }

        $offset = ($paginaAtual - 1) * $itensPorPagina;

        $filtros = [
            'autor' => filter_input(INPUT_GET, 'autor', FILTER_DEFAULT),
            'categoria' => filter_input(
                INPUT_GET,
                'categoria',
                FILTER_VALIDATE_INT,
            ),
            'ano' => filter_input(INPUT_GET, 'ano_lancamento', FILTER_DEFAULT), // Mapeia 'ano_lancamento' do HTML para 'ano' do DAO
            'idioma' => filter_input(INPUT_GET, 'idioma', FILTER_DEFAULT),
        ];

        // remove filtos vazios
        $filtros = array_filter($filtros);

        // busca os livros filtrados
        $livros = $this->livroDao->listFiltered(
            $filtros,
            $itensPorPagina,
            $offset,
        );

        // conta os livros filtrados
        $totalLivros = $this->livroDao->countFiltered($filtros);

        // Busca os dados no Banco
        $autores = $this->livroDao->listDistinctAuthors();
        $categorias = $this->livroDao->listDistinctCategory();
        $idioma = $this->livroDao->listDistinctLanguage();
        $ano_lancamento = $this->livroDao->listDistinctYear();

        // Calcula o total de páginas
        $totalPaginas = ceil($totalLivros / $itensPorPagina);

        loadView('index/explorar', [
            'livros' => $livros,
            'autores' => $autores,
            'categorias' => $categorias,
            'idioma' => $idioma,
            'ano_lancamento' => $ano_lancamento,
            'paginaAtual' => $paginaAtual,
            'totalPaginas' => $totalPaginas,
            'styles' => ['explorar.css'],
        ]);
    }
}
