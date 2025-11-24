<?php

namespace App\Controllers\registro;

use Framework\Database;
use App\Models\Dao\ClientesDao;
use App\Services\ClienteService;

class Cadastro
{
    private ClientesDao $clientesDao;

    public function __construct(Database $db)
    {
        $this->clientesDao = new ClientesDao($db);
        $this->clienteService = new ClienteService($this->clientesDao);
    }

    public function index()
    {
        $data = [
            'title' => 'Cadastro',
            'styles' => ['cadastro.css'],
        ];

        loadView('registro\cadastro', $data);
    }

    public function store()
    {
        $dados = $_POST;

        // Verifica se o E-mail já existe antes de tentar salvar
        if (
            isset($dados['email']) &&
            $this->clientesDao->validarDados('email', $dados['email'])
        ) {
            header('Location: /cadastro?error=email_existe');
            exit();
        }

        if (
            isset($dados['cpf']) &&
            $this->clientesDao->validarDados('cpf', $dados['cpf'])
        ) {
            header('Location: /cadastro?error=cpf_existe');
            exit();
        }

        try {
            $novoId = $this->clienteService->adicionarCliente($dados);
            if ($novoId) {
                $this->gerarSessao($novoId, $dados);

                header('Location: /?success=bemvindo');
                exit();
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            header('Location: /cadastro?error=sistema');
            exit();
        }
    }

    public function validar()
    {
        header('Content-Type: application/json');
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);

        if (!isset($dados['campo']) || !isset($dados['valor'])) {
            echo json_encode(['erro' => 'Dados inválidos']);
            exit();
        }

        $campo = trim($dados['campo']);
        $valor = trim($dados['valor']);

        $existe = $this->clientesDao->validarDados($campo, $valor);

        echo json_encode(['existe' => $existe]);
        exit();
    }

    private function gerarSessao($id, $dadosFormulario)
    {
        $_SESSION['cliente'] = true;
        $_SESSION['cliente_id'] = $id;
        $_SESSION['nome'] = $dadosFormulario['nome'];
        $_SESSION['email'] = $dadosFormulario['email'];
        $_SESSION['ultimo_acesso'] = time();

        session_write_close();
    }

    public function logout()
    {
        session_destroy();
        header('location:index.php');
        exit();
    }
}
