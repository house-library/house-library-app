<?php

declare(strict_types=1);

namespace App\Controllers\adm;

use Framework\Database;
use App\Models\Dao\PedidoDao;

error_log("========== ARQUIVO COMPRAS.PHP CARREGADO ==========");

class Compras
{
    private PedidoDao $pedidoDao;

    public function __construct(Database $db)
    {
        $this->pedidoDao = new PedidoDao($db);
    }

    public function listarPorCliente(array $params): void
    {
        $clienteId = (int) ($params['id'] ?? 0);

        if ($clienteId === 0) {
            redirect('/clientes');
            return;
        }

        try {
            $compras = $this->pedidoDao->listarPorCliente($clienteId);
            $nomeCliente = $this->pedidoDao->obterNomeCliente($clienteId);
            
        } catch (\Exception $e) {
            error_log('Erro ao listar compras: ' . $e->getMessage());
            redirect('/error');
            return;
        }

        loadView('adm/compras', [
            'title' => 'Histórico de Compras',
            'styles' => ['headeradm.css', 'clientes.css'], 
            'compras' => $compras,
            'nome_cliente' => $nomeCliente,
            'datatables' => true,
        ]);
    }
}