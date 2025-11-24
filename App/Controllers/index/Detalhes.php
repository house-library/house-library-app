<?php

namespace App\Controllers\index;

use Framework\Database;
use App\Models\Dao\LivroDao;

class Detalhes
{
    private LivroDao $livroDao;

    public function __construct()
    {
        // Conecta ao banco de dados
        $config = require basePath('config/db.php');
        $db = new Database($config);

        // Inicializa o DAO
        $this->livroDao = new LivroDao($db);
    }

    public function index(): void
    {
        try {
            // Pega o ID da URL 
            $id = (int) ($_GET['id'] ?? 0);

            $livro = $this->livroDao->getById($id);

            
            if (!$livro) {
                redirect('/404'); 
                return;
            }

            // Verifica se existe categoria_id
            $categoriaId = $livro['categoria_id'] ?? 0;
            
            $livrosRelacionados = $this->livroDao->getRelatedByCategory(
                $categoriaId,
                $id,
                4 // Quantidade de livros relacionados
            );

            $data = [
                'title' => $livro['titulo'],
                'styles' => ['detalhes.css'], 
                'livro' => $livro,
                'livrosRelacionados' => $livrosRelacionados,
            ];

            loadView('index\detalhes', $data);

        } catch (\Exception $e) {
            error_log('Erro ao exibir detalhes do livro: ' . $e->getMessage());
            redirect('/erro'); 
        }
    }
}