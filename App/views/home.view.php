<?php loadPartial('head', $data); ?>
<?php loadPartial('header'); ?>

<main class="main">
    <div class="hero-image">
        <img src="/assets/imgs/House_Library_banner.png" 
             alt="Biblioteca ao fundo com logo da House Library a frente">
    </div>

    <div class="container">
        <section class="section-category">
            <ul class="ul-category">
                <li class="li-category"><a class="category-link" href="/ficcao">Ficção</a></li>
                <li class="li-category"><a class="category-link" href="/infantis">Infantis</a></li>
                <li class="li-category"><a class="category-link" href="/classicos">Clássicos</a></li>
                <li class="li-category"><a class="category-link" href="/romance">Romance</a></li>
                <li class="li-category"><a class="category-link" href="/misterio">Mistério</a></li>
                <li class="li-category"><a class="category-link" href="/autoajuda">Auto Ajuda</a></li>
                <li class="li-category"><a class="category-link" href="/autoajuda">Romance</a></li>
            </ul>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Ficção</h2>
                <a href="/ficcao" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['ficcao'])): ?>
                    <?php foreach ($viewData['ficcao'] as $livro): ?>
                        <?php
                        $basePath = '/assets/capas-pi/';
                        $folder =
                            $livro['categoria_nome'] === 'classicos'
                                ? 'classicos/'
                                : 'literatura_infantil/';
                        if ($livro['categoria_nome'] === 'Ficção') {
                            $folder = 'fic-cientifica/';
                        }
                        $imagePath = $basePath . $folder . $livro['url_capa'];
                        ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="<?= htmlspecialchars(
                                         $livro['titulo'],
                                     ) ?>">
                            </a>
                            <h3>
                                <a href="/listing?id=<?= $livro[
                                    'livros_id'
                                ] ?>">
                                    <?= htmlspecialchars($livro['titulo']) ?>
                                </a>
                            </h3>
                            <p class="book-author"><?= htmlspecialchars(
                                $livro['nome_autor'],
                            ) ?></p>
                            <p class="book-price">R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Infantis</h2>
                <a href="/infantis" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['infantis'])): ?>
                    <?php foreach ($viewData['infantis'] as $livro): ?>
                        <?php
                        $basePath = '/assets/capas-pi/';
                        $folder = 'literatura_infantil/'; // Categoria 'Infantil' usa a pasta 'literatura_infantil'
                        $imagePath = $basePath . $folder . $livro['url_capa'];
                        ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="<?= htmlspecialchars(
                                         $livro['titulo'],
                                     ) ?>">
                            </a>
                            <h3>
                                <a href="/listing?id=<?= $livro[
                                    'livros_id'
                                ] ?>">
                                    <?= htmlspecialchars($livro['titulo']) ?>
                                </a>
                            </h3>
                            <p class="book-author"><?= htmlspecialchars(
                                $livro['nome_autor'],
                            ) ?></p>
                            <p class="book-price">R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="banner">
            <img src="/assets/imgs/banner-2.png" alt="Banner promocional">
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Literatura Clássica</h2>
                <a href="/classicos" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['classicos'])): ?>
                    <?php foreach ($viewData['classicos'] as $livro): ?>
                        <?php
                        $basePath = '/assets/capas-pi/';
                        $folder = 'classicos/';
                        $imagePath = $basePath . $folder . $livro['url_capa'];
                        ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="<?= htmlspecialchars(
                                         $livro['titulo'],
                                     ) ?>">
                            </a>
                            <h3>
                                <a href="/listing?id=<?= $livro[
                                    'livros_id'
                                ] ?>">
                                    <?= htmlspecialchars($livro['titulo']) ?>
                                </a>
                            </h3>
                            <p class="book-author"><?= htmlspecialchars(
                                $livro['nome_autor'],
                            ) ?></p>
                            <p class="book-price">R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Romance</h2>
                <a href="/romance" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['romance'])): ?>
                    <?php foreach ($viewData['romance'] as $livro): ?>
                         <?php
                         $basePath = '/assets/capas-pi/';
                         $folder = 'romance/';
                         $imagePath = $basePath . $folder . $livro['url_capa'];
                         ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="<?= htmlspecialchars(
                                         $livro['titulo'],
                                     ) ?>">
                            </a>
                            <h3>
                                <a href="/listing?id=<?= $livro[
                                    'livros_id'
                                ] ?>">
                                    <?= htmlspecialchars($livro['titulo']) ?>
                                </a>
                            </h3>
                            <p class="book-author"><?= htmlspecialchars(
                                $livro['nome_autor'],
                            ) ?></p>
                            <p class="book-price">R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="banner">
            <img src="/assets/imgs/banner-3.png" alt="Banner promocional">
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Mistério</h2>
                <a href="/misterio" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['misterio'])): ?>
                    <?php foreach ($viewData['misterio'] as $livro): ?>
                         <?php
                         $basePath = '/assets/capas-pi/';
                         $folder = 'misterio/'; //
                         $imagePath = $basePath . $folder . $livro['url_capa'];
                         ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="<?= htmlspecialchars(
                                         $livro['titulo'],
                                     ) ?>">
                            </a>
                            <h3>
                                <a href="/listing?id=<?= $livro[
                                    'livros_id'
                                ] ?>">
                                    <?= htmlspecialchars($livro['titulo']) ?>
                                </a>
                            </h3>
                            <p class="book-author"><?= htmlspecialchars(
                                $livro['nome_autor'],
                            ) ?></p>
                            <p class="book-price">R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Auto-Ajuda</h2>
                <a href="/autoajuda" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['autoajuda'])): ?>
                    <?php foreach ($viewData['autoajuda'] as $livro): ?>
                         <?php
                         $basePath = '/assets/capas-pi/';
                         $folder = 'autoajuda/';
                         $imagePath = $basePath . $folder . $livro['url_capa'];
                         ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="<?= htmlspecialchars(
                                         $livro['titulo'],
                                     ) ?>">
                            </a>
                            <h3>
                                <a href="/listing?id=<?= $livro[
                                    'livros_id'
                                ] ?>">
                                    <?= htmlspecialchars($livro['titulo']) ?>
                                </a>
                            </h3>
                            <p class="book-author"><?= htmlspecialchars(
                                $livro['nome_autor'],
                            ) ?></p>
                            <p class="book-price">R$ <?= number_format(
                                $livro['preco'],
                                2,
                                ',',
                                '.',
                            ) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php loadPartial('footer'); ?>
