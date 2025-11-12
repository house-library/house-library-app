<?php

namespace App\Models\Dao;

use App\Models\Context as ModelsContext;
use App\Models\Clientes;

class ClientesDao extends ModelsContext
{
    // Listar todos os clientes
    public function listAllClientes(): array
    {
        $sql = '
            SELECT cliente_id, nome_cliente, email_cliente, cpf_cliente, senha_cliente 
            FROM CLIENTES 
            ORDER BY nome_cliente ASC
        ';
        $results = $this->listSql($sql);

        $clientes = [];
        foreach ($results as $row) {
            $clientes[] = new Clientes(
                (int) $row['cliente_id'],
                $row['nome_cliente'],
                $row['senha_cliente'], // ORDEM CORRETA: senha vem antes
                $row['email_cliente'],
                $row['cpf_cliente'],
            );
        }

        return $clientes;
    }

    // Excluir um cliente por ID
    public function deleteCliente(int $id): bool
    {
        $sql = 'DELETE FROM CLIENTES WHERE cliente_id = :id';

        try {
            $this->executeConsult($sql, [':id' => $id]);
            return true;
        } catch (\PDOException $e) {
            error_log('Erro ao excluir cliente: ' . $e->getMessage());
            throw $e;
        }
    }
}
