<?php

declare(strict_types=1);

namespace App\Controllers\adm;

use Framework\Database;
use App\Models\Dao\LivroDao;

class Publicados
{
    private LivroDao $livroDao;

    public function __construct(Database $db)
    {
        $this->livroDao = new LivroDao($db);
    }

    public function index(): void
    {
        try {
            $livros = $this->livroDao->listAll();

            $data = [
                'title' => 'Gerenciar E-books',
                'styles' => ['headeradm.css', 'publicados.css'],
                'livros' => $livros,
            ];

            loadView('adm/publicados', $data);
        } catch (\Exception $e) {
            error_log('Erro: ' . $e->getMessage());
        }
    }

    public function destroy(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);
        if ($id > 0) {
            $this->livroDao->delete($id);
        }
        header('Location: /publicados');
        exit();
    }
}
