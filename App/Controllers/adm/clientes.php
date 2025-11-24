<?php

declare(strict_types=1);

namespace App\Controllers\adm;

use Framework\Database;
use App\Models\Dao\ClientesDao;

class Clientes
{
    private ClientesDao $clientesDao;

    public function __construct(private Database $db)
    {
        $this->clientesDao = new ClientesDao($db);
    }

    // Listar todos (Painel Admin)
    public function index(): void
    {
        try {
            $clientes = $this->clientesDao->listarTodos();
        } catch (\Exception $e) {
            error_log('Erro: ' . $e->getMessage());
            redirect('/error');
            return;
        }

        loadView('adm\clientes', [
            'title' => 'Gerenciar Clientes',
            'styles' => ['headeradm.css', 'clientes.css'],
            'clientes' => $clientes,
            'datatables' => true,
        ]);
    }

    // Excluir (Painel Admin)
    public function destroy(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);
        if ($id > 0) {
            $this->clientesDao->excluir($id);
        }
        redirect('/clientes');
    }
}
