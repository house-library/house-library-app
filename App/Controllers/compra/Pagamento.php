<?php

namespace App\Controllers\compra;

use Framework\Database;
use App\Models\Dao\CarrinhoDao;
use App\Models\Dao\LivroDao;
use App\Models\Dao\PedidoDao;

require_once dirname(__DIR__, 2) . '/lib/phpqrcode.php';

class Pagamento
{
    private $carrinhoDao;
    private $livroDao;
    private $pedidoDao;

    public function __construct(Database $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cliente'])) {
            header('Location: /login');
            exit();
        }

        $this->carrinhoDao = new CarrinhoDao();
        $this->livroDao = new LivroDao($db);
        $this->pedidoDao = new PedidoDao($db);
    }

    public function index()
    {
        $produtosSessao = $this->carrinhoDao->cart();

        if (empty($produtosSessao)) {
            header('Location: /explorar');
            exit();
        }

        $ids = array_keys($produtosSessao);
        $livros = $this->livroDao->getByIds($ids);

        $total = 0;
        $quantidadeItens = 0;

        foreach ($livros as $livro) {
            $qtd = $produtosSessao[$livro['livros_id']];
            $total += $livro['preco'] * $qtd;
            $quantidadeItens += $qtd;
        }

        $data = [
            'title' => 'Pagamento',
            'styles' => ['pagamento.css'],
            'total' => $total,
            'quantidadeItens' => $quantidadeItens,
        ];

        loadView('compra/pagamento', $data);
    }

    public function add()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->carrinhoDao->add($id);
        }

        header('Location: /pagamento');
        exit();
    }

    public function finalizar()
    {
        // Define que a resposta será JSON
        header('Content-Type: application/json');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $clienteId =
            $_SESSION['cliente']['cliente_id'] ?? $_SESSION['cliente_id'];
        $metodoPost = $_POST['metodo-pagamento'] ?? 'pix';

        $metodoPost = strtolower($metodoPost);

        $metodoId = 1;
        $metodoNome = 'Pix';

        if ($metodoPost == 'boleto') {
            $metodoId = 2;
            $metodoNome = 'Boleto';
        } elseif (
            $metodoPost == 'cartao' ||
            $metodoPost == 'cartão de crédito'
        ) {
            $metodoId = 3;
            $metodoNome = 'Cartão de Crédito';
        }

        $produtosSessao = $this->carrinhoDao->cart();

        if (empty($produtosSessao)) {
            echo json_encode(['sucesso' => false, 'msg' => 'Carrinho vazio']);
            exit();
        }

        $ids = array_keys($produtosSessao);
        $livros = $this->livroDao->getByIds($ids);
        $itensParaSalvar = [];
        $total = 0;

        foreach ($livros as $livro) {
            $qtd = $produtosSessao[$livro['livros_id']];
            $preco = $livro['preco'];
            $subtotal = $preco * $qtd;
            $total += $subtotal;

            $itensParaSalvar[] = [
                'livro' => $livro,
                'quantidade' => $qtd,
                'subtotal' => $preco,
            ];
        }

        try {
            $idPedido = $this->pedidoDao->salvarPedido($clienteId, $total);
            $this->pedidoDao->salvarDetalhes($idPedido, $itensParaSalvar);
            $this->pedidoDao->salvarPagamento($idPedido, $metodoId);

            $this->carrinhoDao->clear();

            $qrCodeLink = null;
            $urlBoleto = null;

            if ($metodoId == 1) {
                $textoPix =
                    "Pagamento Pedido #$idPedido - Valor: R$ " .
                    number_format($total, 2, ',', '.');

                $qrCodeLink =
                    'https://quickchart.io/qr?text=' .
                    urlencode($textoPix) .
                    '&size=300';
            } elseif ($metodoId == 2) {
                $urlBoleto = '/boleto/visualizar?id=' . $idPedido;
            }

            // Retorna JSON para o JavaScript
            echo json_encode([
                'sucesso' => true,
                'id_pedido' => $idPedido,
                'qr_code' => $qrCodeLink,
                'url_boleto' => $urlBoleto,
                'metodo' => $metodoNome,
            ]);
            exit();
        } catch (\Exception $e) {
            // Retorna erro em JSON
            echo json_encode(['sucesso' => false, 'msg' => $e->getMessage()]);
            exit();
        }
    }
}
