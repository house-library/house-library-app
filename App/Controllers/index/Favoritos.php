<?php

namespace App\Controllers\index;
use Framework\Database;
use App\Models\Dao\LivroDao;

class Favoritos
{
    private LivroDao $livroDao;

    public function __construct(Database $db)
    {
        $this->livroDao = new LivroDao($db);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index()
    {
        $idsFavoritos = $_SESSION['favoritos'] ?? [];
        $itens = [];

        if (!empty($idsFavoritos)) {
            // Remove duplicatas e garante que são inteiros
            $idsUnicos = array_unique($idsFavoritos);

            $livrosDoBanco = $this->livroDao->getByIds($idsUnicos);

            foreach ($livrosDoBanco as $livro) {
                $itens[] = [
                    'livro' => $livro,
                ];
            }
        }

        $data = [
            'title' => 'Favoritos',
            'styles' => ['favoritos.css', 'pagination.css'],
            'itens' => $itens,
            'paginaAtual' => 1,
            'totalPaginas' => 1,
        ];

        loadView('index\favoritos', $data);
    }

    public function add()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            if (!isset($_SESSION['favoritos'])) {
                $_SESSION['favoritos'] = [];
            }
            if (!in_array($id, $_SESSION['favoritos'])) {
                $_SESSION['favoritos'][] = $id;
            }

            header('Location: /favoritos');
            exit();
        }
    }

    public function remove()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id && isset($_SESSION['favoritos'])) {
            $key = array_search($id, $_SESSION['favoritos']);
        }
        if ($key !== false) {
            unset($_SESSION['favoritos'][$key]);
        }

        header('Location: /favoritos');
        exit();
    }
}
