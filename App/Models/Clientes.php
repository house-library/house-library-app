<?php
namespace App\Models;

class Clientes
{
    public $cliente_id = null;
    public $nome_cliente = '';
    public $senha_cliente = '';
    public $email_cliente = '';
    public $cpf_cliente = '';
    public $ativo;
    public $datacadastro = '';

    public function __construct(
        $cliente_id = null,
        $nome_cliente = null,
        $senha_cliente = null,
        $email_cliente = null,
        $cpf_cliente = null,
        $ativo = null,
        $datacadastro = null,
    ) {
        date_default_timezone_set('America/Sao_Paulo');
        $this->cliente_id = $cliente_id;
        $this->nome_cliente = $nome_cliente;
        $this->senha_cliente = $senha_cliente;
        $this->email_cliente = $email_cliente;
        $this->cpf_cliente = $cpf_cliente;
        $this->ativo = $ativo;
        $this->datacadastro = $datacadastro ?? date('Y-m-d H:i:s');
    }

    public function toArray()
    {
        return [
            'cliente_id' => $this->cliente_id,
            'nome_cliente' => $this->nome_cliente,
            'email_cliente' => $this->email_cliente,
            'cpf_cliente' => $this->cpf_cliente,
            'ativo' => $this->ativo,
            'datacadastro' => $this->datacadastro,
        ];
    }

    public function atributosPreenchidos()
    {
        return array_filter(
            $this->toArray(),
            fn($value) => $value !== null && $value !== '',
        );
    }
}
