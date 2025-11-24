<?php

namespace App\Controllers\compra;

use Framework\Database;
use App\Models\Dao\PedidoDao;

class Boleto
{
    private $pedidoDao;

    public function __construct(Database $db)
    {
        $this->pedidoDao = new PedidoDao($db);
    }

    public function visualizar()
    {
        $idPedido = $_GET['id'] ?? null;

        if (!$idPedido) {
            die('Pedido inválido.');
        }

        $pedido = $this->pedidoDao->getById($idPedido);

        $valor_cobrado = $pedido['valor_total'];

        $dias_de_prazo_para_pagamento = 5;
        $taxa_boleto = 2.95;
        $data_venc = date(
            'd/m/Y',
            time() + $dias_de_prazo_para_pagamento * 86400,
        );

        $valor_boleto = number_format(
            $valor_cobrado + $taxa_boleto,
            2,
            ',',
            '',
        );

        $dadosboleto = [];

        $dadosboleto['nosso_numero'] = '12345678';
        $dadosboleto['numero_documento'] = $idPedido;
        $dadosboleto['data_vencimento'] = $data_venc;
        $dadosboleto['data_documento'] = date('d/m/Y');
        $dadosboleto['data_processamento'] = date('d/m/Y');
        $dadosboleto['valor_boleto'] = $valor_boleto;

        // DADOS DO SEU CLIENTE
        $dadosboleto['sacado'] = 'Cliente House Library';
        $dadosboleto['nome'] = '';
        $dadosboleto['CPF'] = '';

        // INFORMACOES PARA O CLIENTE
        $dadosboleto['demonstrativo1'] = 'Pagamento de Compra na House Library';
        $dadosboleto['demonstrativo2'] =
            "Mensalidade referente a compra de livros<br>Taxa bancária - R$ " .
            number_format($taxa_boleto, 2, ',', '');
        $dadosboleto['demonstrativo3'] =
            'House Library - Seu conhecimento em casa';
        $dadosboleto['instrucoes1'] =
            '- Sr. Caixa, cobrar multa de 2% após o vencimento';
        $dadosboleto['instrucoes2'] = '- Receber até 10 dias após o vencimento';
        $dadosboleto['instrucoes3'] =
            '- Em caso de dúvidas entre em contato conosco: suporte@houselibrary.com';
        $dadosboleto['instrucoes4'] = '';

        // DADOS OPCIONAIS
        $dadosboleto['quantidade'] = '1';
        $dadosboleto['valor_unitario'] = $valor_boleto;
        $dadosboleto['aceite'] = '';
        $dadosboleto['especie'] = "R$";
        $dadosboleto['especie_doc'] = 'DS';

        // DADOS DA SUA CONTA
        $dadosboleto['agencia'] = '1234';
        $dadosboleto['conta'] = '0012345';
        $dadosboleto['conta_dv'] = '6';
        $dadosboleto['carteira'] = '57';

        // NOSSOS DADOS
        $dadosboleto['identificacao'] = 'House Library Ltda';
        $dadosboleto['cpf_cnpj'] = '00.000.000/0001-00';
        $dadosboleto['endereco'] = 'Rua da Biblioteca, 1000';
        $dadosboleto['cidade_uf'] = 'São Paulo / SP';
        $dadosboleto['cedente'] = 'House Library Ltda';

        $data = ['dadosboleto' => $dadosboleto];

        require_once dirname(__DIR__, 3) . '/App/views/compra/ver_boleto.php';
    }
}
