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
}
