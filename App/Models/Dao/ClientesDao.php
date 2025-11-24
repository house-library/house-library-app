<?php

namespace App\Models\Dao;

use App\Models\context;
use App\Models\Clientes;

class ClientesDao extends context
{
    // Validação para o JavaScript
    public function validarDados($campo, $valor)
    {
        // Traduz o campo do front para o banco
        $mapa = ['email' => 'email_cliente', 'cpf' => 'cpf_cliente'];

        if (!array_key_exists($campo, $mapa)) {
            return false;
        }

        $coluna = $mapa[$campo] ?? $campo;

        $sql = "SELECT COUNT(*) as total FROM CLIENTES WHERE $coluna = ?";
        $resultado = $this->getoneWithSQL($sql, [$valor]);

        return $resultado['total'] > 0;
    }

    public function adicionar(Clientes $cliente)
    {
        // Pega os dados limpos do model
        $dados = $cliente->atributosPreenchidos();

        // Separa chaves e valores
        $atributos = array_keys($dados);
        $valores = array_values($dados);

        return $this->inserir('CLIENTES', $atributos, $valores);
    }

    public function autenticar($login)
    {
        $sql =
            'SELECT * FROM CLIENTES WHERE email_cliente = ? OR cpf_cliente = ?';
        return $this->getoneWithSQL($sql, [$login, $login]);
    }

    // Listar Todos para painel administrativo
    public function listarTodos()
    {
        return $this->listSql(
            'SELECT * FROM CLIENTES ORDER BY nome_cliente ASC',
        );
    }

    public function listarClientesAtivos()
    {
        return $this->listar("SELECT * FROM CLIENTES WHERE status = 'A'");
    }

    public function obterPorId($id)
    {
        $sql = 'SELECT * FROM CLIENTES WHERE cliente_id = ?';
        return $this->getoneWithSQL($sql, [$id]);
    }

    public function alterar(Cliente $cliente)
    {
        $dados = $cliente->atributosPreenchidos();
        $atributos = array_keys($dados);
        $valores = array_values($dados);

        return $this->atualizar(
            'CLIENTES',
            $atributos,
            $valores,
            $cliente->getId(),
        );
    }

    public function excluir($id)
    {
        return $this->deletar('CLIENTES', 'cliente_id', $id);
    }

    public function atualizarSenhaPorEmail($email, $novaSenhaHash)
    {
        $sql = 'UPDATE CLIENTES SET senha_cliente = ? WHERE email_cliente = ?';

        $stmt = $this->executeConsult($sql, [$novaSenhaHash, $email]);
        return $stmt->rowCount() > 0;
    }
}
