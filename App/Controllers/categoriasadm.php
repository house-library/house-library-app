<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Database;
use App\Models\Dao\CategoriaDao;
use App\Services\CategoriaService;

class categoriasadm
{
    private CategoriaDao $categoriaDao;
    private CategoriaService $categoriaService;

    public function __construct(private Database $db)
    {
        $this->categoriaDao = new CategoriaDao($db);
        $this->categoriaService = new CategoriaService($this->categoriaDao);
    }

    public function index(): void
    {
        try {
            $categorias = $this->categoriaDao->listAll();

            $data = [
                'title' => 'Gerenciar Categorias',
                'styles' => ['headeradm.css', 'categoriasadm.css'],
                'categorias' => $categorias,
                'errors' => [],
            ];

            loadView('categoriasadm', $data);
        } catch (\Exception $e) {
            error_log('Erro ao listar categorias: ' . $e->getMessage());
            redirect('/erro');
        }
    }

    // Corrija o método edit para receber um array de parâmetros
    public function edit(array $params): void
    {
        // Recebe um array
        // Extrai o ID do array de parâmetros
        $id = (int) ($params['id'] ?? 0);
        $categoria_para_editar = null;

        if ($id > 0) {
            $categoria_para_editar = $this->categoriaDao->getById($id);
            if (!$categoria_para_editar) {
                redirect('/categoriasadm?error=categoria_nao_encontrada');
                return;
            }
        }

        $categorias = $this->categoriaDao->listAll();

        $data = [
            'title' => $id ? 'Editar Categoria' : 'Nova Categoria',
            'styles' => ['headeradm.css', 'categoriasadm.css'],
            'categorias' => $categorias,
            'categoria' => $categoria_para_editar,
            'errors' => [],
        ];

        loadView('categoriasadm', $data);
    }

    public function store(): void
    {
        try {
            if (!empty($_POST['categoria_id'])) {
                // Atualizar
                $this->categoriaService->alterarCategoria($_POST);
                redirect('/categoriasadm?success=atualizado');
            } else {
                // Criar
                $this->categoriaService->adicionarCategoria($_POST);
                redirect('/categoriasadm?success=criado');
            }
        } catch (\Exception $e) {
            $data = [
                'title' => 'Erro',
                'styles' => ['headeradm.css', 'categoriasadm.css'],
                'errors' => [$e->getMessage()],
                'categoria' => $_POST,
            ];

            loadView('categoriasadm', $data);
        }
    }

    public function destroy(array $params): void
    {
        // Recebe um array
        // Extrai o ID do array de parâmetros
        $id = (int) ($params['id'] ?? 0);

        if ($id <= 0) {
            redirect('/categoriasadm?error=id-invalido');
            return;
        }

        try {
            $this->categoriaDao->delete($id);
            redirect('/categoriasadm?success=excluido');
        } catch (\Exception $e) {
            redirect('/categoriasadm?error=nao-pode-excluir');
        }
    }

    // Alterar status (A/I)
    public function toggleStatus(array $params): void
    {
        // Recebe um array
        // Extrai o ID do array de parâmetros
        $id = (int) ($params['id'] ?? 0);

        if ($id <= 0) {
            redirect('/categoriasadm?error=parametros-invalidos');
            return;
        }

        try {
            $categoria = $this->categoriaDao->getById($id);
            if (!$categoria) {
                redirect('/categoriasadm?error=categoria-nao-encontrada');
                return;
            }

            // Alterna o status
            $categoria->status = $categoria->status === 'A' ? 'I' : 'A';
            $this->categoriaDao->update($categoria);
            redirect('/categoriasadm?success=status-alterado');
        } catch (\Exception $e) {
            redirect('/categoriasadm?error=erro-status');
        }
    }
}
