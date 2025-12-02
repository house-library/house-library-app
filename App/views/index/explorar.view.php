<?php loadPartial('head', ['styles' => $styles ?? []]); ?>
<?= loadPartial('header') ?>  

<?php include __DIR__ . '/../vlibras.html'; ?>

<main class="explore-page-container">
    <div id="campo-filtragem">
        <form action="/explorar" method="GET" class="filter-form">

            <select name="documento" aria-label="Tipo de documento">
                <option value="" selected disabled>Tipo de documento</option>
                <option value="epub">E-book (EPUB)</option>
                <option value="pdf">E-book (PDF)</option>
            </select>

            <select name="autor" aria-label="Autor">
        <option value="" selected disabled>Autor</option>
        <?php if (isset($autores) && is_iterable($autores)): ?>
            <?php foreach ($autores as $autor): ?>
                <?php $selected =
                    isset($_GET['autor']) &&
                    $_GET['autor'] == $autor['nome_autor']
                        ? 'selected'
                        : ''; ?>
                <option value="<?= htmlspecialchars(
                    $autor['nome_autor'],
                ) ?>" <?= $selected ?>>
                    <?= htmlspecialchars($autor['nome_autor']) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <select name="categoria" aria-label="Categoria">
        <option value="" selected disabled>Categoria</option>
        <?php if (isset($categorias) && is_iterable($categorias)): ?>
            <?php foreach ($categorias as $cat): ?>
                <?php $selected =
                    isset($_GET['categoria']) &&
                    $_GET['categoria'] == $cat['categoria_id']
                        ? 'selected'
                        : ''; ?>
                <option value="<?= htmlspecialchars(
                    $cat['categoria_id'],
                ) ?>" <?= $selected ?>>
                    <?= htmlspecialchars($cat['descricao']) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <select name="ano_lancamento" aria-label="Ano de lançamento">
        <option value="" selected disabled>Ano de lançamento</option>
        <?php if (isset($ano_lancamento) && is_iterable($ano_lancamento)): ?>
            <?php foreach ($ano_lancamento as $ano): ?>
                <?php $selected =
                    isset($_GET['ano_lancamento']) &&
                    $_GET['ano_lancamento'] == $ano['ano_lancamento']
                        ? 'selected'
                        : ''; ?>
                <option value="<?= htmlspecialchars(
                    $ano['ano_lancamento'],
                ) ?>" <?= $selected ?>>
                    <?= htmlspecialchars($ano['ano_lancamento']) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <select name="idioma" aria-label="Idioma">
        <option value="" selected disabled>Idioma</option>
        <?php if (isset($idioma) && is_iterable($idioma)): ?>
            <?php foreach ($idioma as $lang): ?>
                <?php $selected =
                    isset($_GET['idioma']) && $_GET['idioma'] == $lang['idioma']
                        ? 'selected'
                        : ''; ?>
                <option value="<?= htmlspecialchars(
                    $lang['idioma'],
                ) ?>" <?= $selected ?>>
                    <?= htmlspecialchars($lang['idioma']) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

            <button type="submit" class="btn-filtrar">Filtrar</button>
            <a href="/explorar" class="btn-limpar">Limpar</a>
        </form>
    </div>

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
       
        <?php endif; ?>
    </div>

   <?php loadPartial('pagination', [
        'paginaAtual' => $paginaAtual,
        'totalPaginas' => $totalPaginas
    ]); ?>

</main>

<?= loadPartial('footer') ?>
