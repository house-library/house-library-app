<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>

<main class="main">
    <div class="hero-image">
        <img src="/assets/imgs/House_Library_banner.png" 
             alt="Biblioteca ao fundo com logo da House Library a frente">
    </div>

    <div class="container">
        <section class="section-category">
            <ul class="ul-category">
                <li class="li-category"><a class="category-link" href="/aventuras">Aventuras</a></li>
                <li class="li-category"><a class="category-link" href="/infantis">Infantis</a></li>
                <li class="li-category"><a class="category-link" href="/literatura-classica">Literatura Clássica</a></li>
                <li class="li-category"><a class="category-link" href="/biografias">Biografias</a></li>
                <li class="li-category"><a class="category-link" href="/cultura">Cultura</a></li>
                <li class="li-category"><a class="category-link" href="/ciencia">Ciência</a></li>
            </ul>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Aventuras</h2>
                <a href="/aventuras" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['aventuras'])): ?>
                    <?php foreach ($viewData['aventuras'] as $livro): ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars(
                                    $livro['url_capa'],
                                ) ?>" 
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
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars(
                                    $livro['url_capa'],
                                ) ?>" 
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
                <a href="/literatura-classica" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['classicos'])): ?>
                    <?php foreach ($viewData['classicos'] as $livro): ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars(
                                    $livro['url_capa'],
                                ) ?>" 
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
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Biografias</h2>
                <a href="/biografias" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['biografias'])): ?>
                    <?php foreach ($viewData['biografias'] as $livro): ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars(
                                    $livro['url_capa'],
                                ) ?>" 
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
                <h2>Cultura</h2>
                <a href="/cultura" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['cultura'])): ?>
                    <?php foreach ($viewData['cultura'] as $livro): ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars(
                                    $livro['url_capa'],
                                ) ?>" 
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
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-ebooks">
            <div class="section-header">
                <h2>Ciência</h2>
                <a href="/ciencia" class="more-btn">Ver mais</a>
            </div>
            <div class="book-grid">
                <?php if (!empty($viewData['ciencia'])): ?>
                    <?php foreach ($viewData['ciencia'] as $livro): ?>
                        <div class="book-card">
                            <a href="/listing?id=<?= $livro['livros_id'] ?>">
                                <img src="<?= htmlspecialchars(
                                    $livro['url_capa'],
                                ) ?>" 
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
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php loadPartial('footer'); ?>
