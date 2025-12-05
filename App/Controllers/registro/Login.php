<?php

namespace App\Controllers\registro;

use Framework\Database;
use Framework\Validation;

class Login
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    // Mostra o formulário
    public function index()
    {
        loadView('registro\login', [
            'title' => 'Login',
            'styles' => ['login.css'],
            'errors' => [],
        ]);
    }

    // POST /login - Processa o login
    public function store()
    {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Validar formato
        $errors = [];
        if (!Validation::email($email)) {
            $errors['email'] = 'Por favor, forneça um email válido.';
        }
        if (!Validation::string($senha, 7, 255)) {
            $errors['senha'] = 'A senha deve ter pelo menos 7 caracteres.';
        }

        if (!empty($errors)) {
            return loadView('registro\login', [
                'title' => 'Login',
                'styles' => ['login.css'],
                'errors' => $errors,
            ]);
        }

        // Buscar usuário
        $cliente = $this->db
            ->query('SELECT * FROM CLIENTES WHERE email_cliente = :email', [
                'email' => $email,
            ])
            ->fetch();

        // Verificar senha
        if (!$cliente || !password_verify($senha, $cliente['senha_cliente'])) {
            $errors['email'] = 'Email ou senha incorretos.';
            return loadView('registro\login', [
                'title' => 'Login',
                'styles' => ['login.css'],
                'errors' => $errors,
            ]);
        }

        // verifica se é admin
        if (isset($cliente['perfil']) && $cliente['perfil'] == 1) {
            header('Location: /categoriasadm'); 
            exit();
        } else {
            header('Location: /');
            exit();
        }


        // expulsa um possivel invasor 
        if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 1) {
        redirect('/'); 
        return;
        }   

        // Sucesso: Criar Sessão
        $this->login($cliente);

        session_write_close();

        header('Location: /');
        exit();
    }

    protected function login($cliente)
    {
        $_SESSION['cliente'] = true;

        $_SESSION['cliente_id'] = $cliente['cliente_id'];
        $_SESSION['email'] = $cliente['email_cliente'];
        $_SESSION['nome'] = $cliente['nome_cliente'];
        $_SESSION['perfil'] = $cliente['perfil'];
        $_SESSION['ultimo_acesso'] = time();
    }

    public function destroy()
    {
        $this->logout();
        header('Location: /');
        exit();
    }

    private function logout()
    {
        // Limpa todas as variáveis de sessão
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly'],
            );
        }

        session_destroy();
    }
}
