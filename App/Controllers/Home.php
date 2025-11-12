<?php

namespace App\Controllers;

use Framework\Database;
use App\Models\Dao\LivroDao;

class Home
{
    private LivroDao $livroDao;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $db = new Database($config);
        $this->livroDao = new LivroDao($db);
    }

    public function index()
    {
        try {
            $ficcao = $this->livroDao->getByCategory('Ficção', 4);
            $infantis = $this->livroDao->getByCategory('Infantil', 4);
            $classicos = $this->livroDao->getByCategory('classicos', 4);
            $romance = $this->livroDao->getByCategory('Romance', 4);
            $misterio = $this->livroDao->getByCategory('misterio', 4);
            $autoajuda = $this->livroDao->getByCategory('Auto-ajuda', 4);

            $data = [
                'title' => 'Início',
                'styles' => ['inicio.css'],
                'ficcao' => $ficcao,
                'infantis' => $infantis,
                'classicos' => $classicos,
                'romance' => $romance,
                'misterio' => $misterio,
                'autoajuda' => $autoajuda,
            ];

            loadView('home', $data);
        } catch (\Exception $e) {
            error_log('Erro ao carregar home: ' . $e->getMessage());

            // Carregar página com arrays vazios em caso de erro
            $data = [
                'title' => 'Início',
                'styles' => ['inicio.css'],
                'ficcao' => [],
                'infantis' => [],
                'classicos' => [],
                'romance' => [],
                'misterio' => [],
                'autoajuda' => [],
            ];

            loadView('home', $data);
        }
    }
}
