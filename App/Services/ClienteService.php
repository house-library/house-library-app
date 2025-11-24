<?php

namespace App\Services;

use App\Models\Clientes;
use App\Models\Dao\ClientesDao;

class ClienteService
{
    private $clientesDao;

    public function __construct(ClientesDao $clientesDao)
    {
        $this->clientesDao = $clientesDao;
    }

    public function adicionarCliente($dados)
    {
        
        $senhaCriptografada = null;
        if (isset($dados['senha']) && !empty($dados['senha'])) {
            $senhaCriptografada = password_hash($dados['senha'], PASSWORD_BCRYPT);
        }

         $cpf = $dados['cpf'] ?? null;

        $cliente = new Clientes(
            null,                           
            $dados['nome'] ?? null,         
            $dados['email'] ?? null,        
            $senhaCriptografada,            
            $cpf,          
            $dados['datanascimento'] ?? null,
            1
        );

        // Chama o DAO para salvar
        return $this->clientesDao->adicionar($cliente);
    }
}