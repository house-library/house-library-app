<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Database;
use App\Models\Dao\ClientesDao;

class Clientes
{
    private ClientesDao $clientesDao;

    public function __construct(private Database $db)
    {
        $this->clientesDao = new ClientesDao($db);
    }

    public function index(): void
    {
        try {
            $clientes = $this->clientesDao->listAllClientes();
        } catch (\Exception $e) {
            error_log('Erro ao listar os clientes: ' . $e->getMessage());
            redirect('/erro');
        }
        $data = [
            'title' => 'Gerenciar Clientes',
            'styles' => ['headeradm.css', 'clientes.css'],
            'clientes' => $clientes,
            'errors' => [],
        ];

        loadView('clientes', $data);
    }

    // Excluir um cliente
    public function destroy(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);

        if ($id <= 0) {
            redirect('/clientes?error=id-invalido');
            return;
        }

        try {
            $this->clientesDao->deleteCliente($id);
            redirect('/clientes?success=excluido');
        } catch (\Exception $e) {
            error_log('Erro ao excluir cliente: ' . $e->getMessage());
            redirect('/clientes?error=nao-pode-excluir');
        }
    }

    public function handlePost(): void
    {
        redirect('/clientes');
    }
}
