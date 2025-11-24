<?php

namespace App\Controllers\registro;

use Framework\Database;
use App\Models\Dao\ClientesDao;

class Recsenha
{
    private $clientesDao;

    public function __construct(Database $db)
    {
        $this->clientesDao = new ClientesDao($db);
    }

    public function index()
    {
        loadView('registro/recsenha', [
            'title' => 'Recuperar Senha',
            'styles' => ['login.css'],
        ]);
    }

    // Recebe E-mail e Nova Senha e atualiza
    public function update()
    {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            // Erro se faltar dados
            return loadView('registro/recsenha', [
                'error' => 'Preencha todos os campos.',
                'styles' => ['login.css'],
            ]);
        }

        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Tenta atualizar no banco
        $atualizou = $this->clientesDao->atualizarSenhaPorEmail(
            $email,
            $senhaHash,
        );

        if ($atualizou) {
            // Sucesso: Manda pro login
            header('Location: /login?success=senha_alterada');
            exit();
        } else {
            // Falha: O e-mail não existe no banco
            loadView('registro/recsenha', [
                'error' => 'E-mail não encontrado no sistema.',
                'styles' => ['login.css'],
            ]);
        }
    }
}
