<?php

namespace App\Controllers\index;

use App\Models\Dao\ClientesDao;
use App\Models\Clientes;
use Framework\Database;

class Conta
{
    private ClientesDao $clienteDao;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $config = require basePath('config/db.php');
        $db = new Database($config);

        $this->clienteDao = new ClientesDao($db);
    }
    
    private function getDadosUsuario()
    {
        if (!isset($_SESSION['cliente_id'])) {
            redirect('/login');
            exit;
        }
        return $this->clienteDao->obterPorId($_SESSION['cliente_id']);
    }

    private function user_array($dadosBanco)
    {
        if (!$dadosBanco) return [];
        
        return [
            'nome' => $dadosBanco['nome_cliente'],
            'email' => $dadosBanco['email_cliente'],
            'cpf' => $dadosBanco['cpf_cliente'],
            'data_nascimento' => $dadosBanco['data_nascimento'],
            'foto_perfil' => $dadosBanco['foto_perfil'] ?? '/assets/imgs/account_circle.svg'
        ];
    }

    public function index()
    {
        $dadosBanco = $this->getDadosUsuario();

        $data = [
            'title' => 'Minha Conta',
            'styles' => ['conta.css'],
            'usuario' => $this->user_array($dadosBanco),
            'isEditing' => false
        ];

        loadView('index\conta', $data);
    }

    public function edit()
    {
        $dadosBanco = $this->getDadosUsuario();

        $data = [
            'title' => 'Editar Conta',
            'styles' => ['conta.css'],
            'usuario' => $this->user_array($dadosBanco),
            'isEditing' => true 
        ];

        loadView('index\conta', $data);
    }

    public function update()
    {
        if (!isset($_SESSION['cliente_id'])) {
            redirect('/login');
            exit;
        }

        $id = $_SESSION['cliente_id'];

        $dadosAtuais = $this->clienteDao->obterPorId($id);

        if (!$dadosAtuais) {
            redirect('/erro');
            exit;
        }

        $cliente = new Clientes(
            $id,
            $_POST['nome'] ?? $dadosAtuais['nome_cliente'],
            $_POST['email'] ?? $dadosAtuais['email_cliente'],
            $dadosAtuais['senha_cliente'], 
            $_POST['cpf'] ?? $dadosAtuais['cpf_cliente'],
            $dadosAtuais['data_nascimento'],
            $dadosAtuais['status'],
            null, // token
            $dadosAtuais['perfil']
        );

        $this->clienteDao->alterar($cliente);
        
        redirect('/conta?success=atualizado');
    }
}