<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header', $viewData); ?> 
<?php include __DIR__ . '/../vlibras.html'; ?>
    
<main class="main">
    <h1 class="page-title">Carrinho de Compras</h1>
    
    <div class="shop-container">
        <section class="cart-items">
            
            <div class="cart-header">
               <div class="cart-title">
                <h2>Seus Livros</h2>
                 <p>Itens (<?= isset($itens) ? count($itens) : 0 ?>)</p>
               </div>

                <a href="/carrinho/limpar" class="remove-all">Remover todos</a>
            </div>

            <?php if (empty($itens)): ?>
                <div class="empty-cart-msg">
                    <h3>Seu carrinho está vazio.</h3>

                    <a href="/explorar" class="btn-destaque">Explorar</a>
                </div>
            <?php else: ?>

                <?php foreach ($itens as $item): ?>
                    <?php
                    $livro = $item['livro'];
                    $basePath = '/assets/capas-pi/';
                    $catNome = mb_strtolower($livro['categoria_nome'] ?? '');
                    $folder = '';
                    if (strpos($catNome, 'fic') !== false) {
                        $folder = 'fic-cientifica/';
                    } elseif (strpos($catNome, 'infan') !== false) {
                        $folder = 'literatura_infantil/';
                    } elseif (
                        strpos($catNome, 'cláss') !== false ||
                        strpos($catNome, 'class') !== false
                    ) {
                        $folder = 'classicos/';
                    } elseif (strpos($catNome, 'roman') !== false) {
                        $folder = 'romance/';
                    } elseif (
                        strpos($catNome, 'mistér') !== false ||
                        strpos($catNome, 'mister') !== false
                    ) {
                        $folder = 'misterio/';
                    } elseif (strpos($catNome, 'ajuda') !== false) {
                        $folder = 'autoajuda/';
                    }
                    if (
                        isset($livro['url_capa']) &&
                        preg_match('/^https?:\/\//', $livro['url_capa'])
                    ) {
                        $imagemSrc = $livro['url_capa'];
                    } else {
                        $nomeArquivo = $livro['url_capa'] ?? 'capadefault.svg';
                        $imagemSrc = $basePath . $folder . $nomeArquivo;
                    }
                    ?>

                    <div class="item-list">
                        <img class="book-cover" 
                             src="<?= htmlspecialchars($imagemSrc) ?>" 
                             alt="Capa do livro <?= htmlspecialchars(
                                 $livro['titulo'],
                             ) ?>"
                             onerror="this.src='/assets/capas-pi/capadefault.svg'">
                        
                        <div class="item-info">
                            <h3><?= htmlspecialchars($livro['titulo']) ?></h3>
                            <p><?= htmlspecialchars($livro['nome_autor']) ?></p>
                            <p>Qtd: <?= $item['quantidade'] ?></p>
                        </div>

                        <div class="items-action">
                            <a href="/carrinho/remover?id=<?= $livro[
                                'livros_id'
                            ] ?>" 
                               class="remove-item" 
                               title="Remover livro">
                                <img src="/assets/buttons/remove.svg" alt="Remover">
                            </a>
                            <p class="item-price">
                                R$ <?= number_format(
                                    $item['subtotal'],
                                    2,
                                    ',',
                                    '.',
                                ) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
            
        </section>

        <aside class="cart-summary">
            <h2>Resumo de pedido</h2>
            <div class="advice-summary">
                <h4>Sem espera, sem frete!</h4>
                <p>Este produto corresponde à versão em eBook.</p>
            </div>
    
            <div class="value-summary">
                <div class="total-value">
                    <h3>Total:</h3>
                    <h3>R$ <?= number_format($total ?? 0, 2, ',', '.') ?></h3>
                </div>
    
                <a href="/pagamento" class="complete-purchase">
                    <span>Finalizar Compra</span>
                </a>
            </div>
        </aside>
    </div>
</main>
    
<?php loadPartial('footer', $viewData); ?>
