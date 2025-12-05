<?php
namespace App\Models;

use PDO;
use Framework\Database;

class Clientes
{
    private $cliente_id;
    private $nome_cliente;
    private $email_cliente;
    private $senha_cliente;
    private $cpf_cliente;
    private $data_nascimento;
    private $status;
    private $token_recuperação;
    private $data_expiração;
    private $perfil;

    public function __construct(
        $cliente_id = null,
        $nome_cliente = null,
        $email_cliente = null,
        $senha_cliente = null,
        $cpf_cliente = null,
        $data_nascimento = null,
        $status = null,
        $token_recuperacao = null,
        $perfil = null
    ) {
        date_default_timezone_set('America/Sao_Paulo');
        $this->cliente_id = $cliente_id;
        $this->nome_cliente = $nome_cliente;
        $this->senha_cliente = $senha_cliente;
        $this->email_cliente = $email_cliente;
        $this->cpf_cliente = $cpf_cliente;
        $this->data_nascimento = $data_nascimento;
        $this->status = $status ?? 1;
        $this->perfil = $perfil ?? 2;
    }



    public function __set($chave, $valor)
    {
        if (property_exists($this, $chave)) {
            $this->$chave = $valor;
        }
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function toArray()
    {
        return [
            'cliente_id' => $this->cliente_id,
            'nome_cliente' => $this->nome_cliente,
            'email_cliente' => $this->email_cliente,
            'senha_cliente' => $this->senha_cliente,
            'cpf_cliente' => $this->cpf_cliente,
            'data_nascimento' => $this->data_nascimento,
            'status' => $this->status,
            'perfil' => $this->perfil,
            'token_recuperacao' => $this->token_recuperacao,
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
?>
