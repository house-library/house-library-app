<?php

namespace App\Controllers\compra;

use Framework\Database;
use App\Models\Dao\PedidoDao;

class Historico
{
    private PedidoDao $pedidoDao;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $config = require basePath('config/db.php');
        $db = new Database($config);
        $this->pedidoDao = new PedidoDao($db);
    }

    public function index()
    {
        if (
            (!isset($_SESSION['cliente']) || $_SESSION['cliente'] !== true) &&
            !isset($_SESSION['cliente_id'])
        ) {
            redirect('/login');
            exit();
        }

        $clienteId = $_SESSION['cliente_id'] ?? ($_SESSION['id'] ?? null);

        if (!$clienteId) {
            redirect('/login');
            exit();
        }

        $dadosUsuario = [
            'nome' => $_SESSION['nome'] ?? 'Cliente',
            'id' => $clienteId,
        ];

        $todosLivros = $this->pedidoDao->getLivrosComprados((int) $clienteId);

        $itensPorPagina = 8;
        $paginaAtual = filter_input(INPUT_GET, 'pg', FILTER_VALIDATE_INT) ?? 1;
        if ($paginaAtual < 1) {
            $paginaAtual = 1;
        }

        $totalLivros = count($todosLivros);
        $totalPaginas = ceil($totalLivros / $itensPorPagina);

        if ($paginaAtual > $totalPaginas && $totalPaginas > 0) {
            $paginaAtual = $totalPaginas;
        }

        $offset = ($paginaAtual - 1) * $itensPorPagina;

        $livrosPagina = array_slice($todosLivros, $offset, $itensPorPagina);

        loadView('compra/historico', [
            'title' => 'Historico',
            'styles' => ['historico.css', 'pagination.css'],
            'usuario' => $dadosUsuario,
            'paginaAtual' => $paginaAtual,
            'totalPaginas' => $totalPaginas,
            'livros' => $livrosPagina,
        ]);
    }
}
