<?php

namespace App\Controllers\compra;
use Framework\Database;
use App\Models\Dao\LivroDao;
use App\Models\Dao\CarrinhoDao;

class Carrinho
{
    private LivroDao $livroDao;
    private CarrinhoDao $cart;

    public function __construct(Database $db)
    {
        $this->livroDao = new LivroDao($db);
        $this->cart = new CarrinhoDao();
    }

    public function index()
    {
        $produtosSessao = $this->cart->cart();

        $itensCarrinho = [];
        $totalGeral = 0;

        if (!empty($produtosSessao)) {
            $ids = array_keys($produtosSessao);
            $livrosDoBanco = $this->livroDao->getByIds($ids);

            foreach ($livrosDoBanco as $livro) {
                $id = $livro['livros_id'];
                $quantidade = $produtosSessao[$id] ?? 0;
                $subtotal = $livro['preco'] * $quantidade;

                $itensCarrinho[] = [
                    'livro' => $livro,
                    'quantidade' => $quantidade,
                    'subtotal' => $subtotal,
                ];

                $totalGeral += $subtotal;
            }
        }

        $data = [
            'title' => 'Carrinho',
            'styles' => ['carrinho.css'],
            'itens' => $itensCarrinho,
            'total' => $totalGeral,
        ];

        loadView('compra\carrinho', $data);
    }

    public function add()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->cart->add($id);
        }

        header('Location: /carrinho');
        exit();
    }

    public function remove()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->cart->remove($id);
        }
        header('Location: /carrinho');
        exit();
    }

    public function clear()
    {
        $this->cart->clear();
        header('Location: /carrinho');
        exit();
    }
}
