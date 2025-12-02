<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>  

<main class="explore-page-container">
 <div class="books">
        <?php if (!empty($livros)): ?>
            <?php foreach ($livros as $livro): ?>
                <?php
                $basePath = '/assets/capas-pi/';
                $catNome = mb_strtolower($livro['categoria_nome'] ?? '');
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
                $imagemSrc = $basePath . $folder . $livro['url_capa'];
                if (preg_match('/^http/', $livro['url_capa'])) {
                    $imagemSrc = $livro['url_capa'];
                }
                ?>

                <div class="book-item">
                        <a href="/detalhes?id=<?= $livro['livros_id'] ?>">
                        <img src="<?= htmlspecialchars($imagemSrc) ?>" 
                             alt="<?= htmlspecialchars($livro['titulo']) ?>"
                             >
                    </a>
                    
                    <div class="book-info">
                        <h3>
                            <a href="/detalhes?id=<?= $livro['livros_id'] ?>">
                                <?= htmlspecialchars($livro['titulo']) ?>
                            </a>
                        </h3>
                        
                        <p class="book-author">
                            <?= htmlspecialchars($livro['nome_autor']) ?>
                        </p>
                        
                        <p class="book-price">
                            R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?>
                        </p>
                    </div>
                </div>


            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-results"">
                <h3>Poxa, não encontramos nada com esse nome</h3>
                <a href="/controllers/explorar.php" class="btn-destaque">Ver todos os livros</a>
            </div>
        <?php endif; ?>
    </div>

   </div> 
   
   <?php if (isset($totalPaginas) && $totalPaginas > 1): ?>
        <?php loadPartial('pagination', [
            'paginaAtual' => $paginaAtual,
            'totalPaginas' => $totalPaginas
        ]); ?>
    <?php endif; ?>

</main>

        <?= loadPartial('footer') ?>
