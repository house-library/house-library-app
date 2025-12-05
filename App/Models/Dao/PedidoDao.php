<?php

namespace App\Models\Dao;

use App\Models\context;
use Framework\Database;

class PedidoDao extends context
{
    public function __construct(Database $db)
    {
        parent::__construct($db);
    }

    public function salvarPedido($clienteId, $valorTotal)
    {
        $idPedido = $this->inserir(
            'PEDIDOS',
            ['cliente_id', 'valor_total', 'status_pedido', 'data_pedido'],
            [$clienteId, $valorTotal, 'Aprovado', date('Y-m-d H:i:s')],
        );

        return $idPedido;
    }

    public function salvarDetalhes($pedidoId, $itens)
    {
        foreach ($itens as $item) {
            $sql =
                'INSERT INTO DETALHES_PEDIDOS (pedidos_id, livros_id, quantidade, valor_pago) VALUES (?, ?, ?, ?)';

            $this->executeConsult($sql, [
                $pedidoId,
                $item['livro']['livros_id'],
                $item['quantidade'],
                $item['subtotal'],
            ]);
        }
    }

    public function getLivrosComprados(int $clienteId): array
    {
        $sql = "SELECT L.*, P.data_pedido, P.status_pedido, C.descricao as categoria_nome
                FROM PEDIDOS P
                JOIN DETALHES_PEDIDOS DP ON P.pedidos_id = DP.pedidos_id
                JOIN LIVROS L ON DP.livros_id = L.livros_id
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE P.cliente_id = :cliente_id
                ORDER BY P.data_pedido DESC";

        return $this->listSql($sql, [':cliente_id' => $clienteId]);
    }

    public function getById($idPedido)
    {
        $sql = 'SELECT * FROM PEDIDOS WHERE pedidos_id = ?';

        $stmt = $this->executeConsult($sql, [$idPedido]);

        return $stmt->fetch();
    }

    public function salvarPagamento($pedidoId, $metodoId)
    {
        $sql =
            'INSERT INTO PAGAMENTOS (pedidos_id, metodo_pagamento_id, status_pagamento) VALUES (?, ?, ?)';

        $this->executeConsult($sql, [$pedidoId, $metodoId, 'Aprovado']);
    }

    public function listarPorCliente($clienteId)
    {
        $sql = "SELECT P.*, 
                       GROUP_CONCAT(L.titulo SEPARATOR ', ') as livros_nomes
                FROM PEDIDOS P
                JOIN DETALHES_PEDIDOS DP ON P.pedidos_id = DP.pedidos_id
                JOIN LIVROS L ON DP.livros_id = L.livros_id
                WHERE P.cliente_id = ?
                GROUP BY P.pedidos_id
                ORDER BY P.data_pedido DESC";
                
        return $this->listSql($sql, [$clienteId]);
    }

    public function obterNomeCliente($clienteId)
    {
        $sql = "SELECT nome_cliente FROM CLIENTES WHERE cliente_id = ?";
        $resultado = $this->getoneWithSQL($sql, [$clienteId]);
        return $resultado['nome_cliente'] ?? 'Cliente';
    }

}
