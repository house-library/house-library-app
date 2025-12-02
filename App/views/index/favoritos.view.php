<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>    

<?php include __DIR__ . '/../vlibras.html'; ?>

<main class="favorites-main">
    <h2 class="favorites-title">Favoritos</h2>

    <?php if (empty($itens)): ?>
        
        <div class="favorites-empty">
            <h3>Você ainda não tem favoritos.</h3>
            <a href="/explorar" class="btn-destaque">Explorar Livros</a>
        </div>

    <?php else: ?>

        <div class="books-grid">

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

            <section class="item-list">
                <img 
                    class="book-cover" 
                    src="<?= htmlspecialchars($imagemSrc) ?>" 
                    alt="Capa"
                >
                
                <div class="item-info">
                    <h3><?= htmlspecialchars($livro['titulo']) ?></h3>
                    <p><?= htmlspecialchars($livro['nome_autor']) ?></p>
                    <h4 class="item-price">
                        R$ <?= number_format(
                            $livro['preco'] ?? 0,
                            2,
                            ',',
                            '.',
                        ) ?>
                    </h4>
                </div>

                <div class="item-action-box">
                    <a class="btn-add-to-cart" href="/carrinho/add?id=<?= $livro[
                        'livros_id'
                    ] ?>">
                        Comprar
                    </a>

                    <a class="btn-add-to-cart" href="/carrinho/add?id=<?= $livro[
                        'livros_id'
                    ] ?>">
                        Adicionar ao carrinho
                    </a>

                    <a class="btn-remove-fav" href="/favoritos/remover?id=<?= $livro[
                        'livros_id'
                    ] ?>">
                        Remover
                    </a>
                </div>
            </section>

        <?php endforeach; ?>
        </div>

         <?php loadPartial('pagination', [
        'paginaAtual' => $paginaAtual,
        'totalPaginas' => $totalPaginas
    ]); ?>

    <?php endif; ?>

</main>

<?php loadPartial('footer'); ?>
