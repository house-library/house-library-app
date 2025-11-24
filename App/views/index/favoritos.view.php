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
            } elseif (strpos($catNome, 'cláss') !== false) {
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
            $imagemSrc = preg_match('/^http/', $livro['url_capa'])
                ? $livro['url_capa']
                : $basePath . $folder . $livro['url_capa'];
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

        <?php if (isset($totalPaginas) && $totalPaginas > 1): ?>
            <div class="pagination-container">

                <?php $queryParams = $_GET; ?>

                <?php if ($paginaAtual > 1): ?>
                    <?php
                    $queryParams['pg'] = $paginaAtual - 1;
                    $linkAnterior = http_build_query($queryParams);
                    ?>
                    <a href="?<?= $linkAnterior ?>">&laquo; Anterior</a>
                <?php endif; ?>

                <span>Página <?= $paginaAtual ?> de <?= $totalPaginas ?></span>

                <?php if ($paginaAtual < $totalPaginas): ?>
                    <?php
                    $queryParams['pg'] = $paginaAtual + 1;
                    $linkProxima = http_build_query($queryParams);
                    ?>
                    <a href="?<?= $linkProxima ?>">Próxima &raquo;</a>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    <?php endif; ?>

</main>

<?php loadPartial('footer'); ?>
