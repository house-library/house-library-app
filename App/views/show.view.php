<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>    

<section class="ebook">
    <img src="<?= htmlspecialchars($viewData['livro']['url_capa']) ?>" 
         alt="<?= htmlspecialchars($viewData['livro']['titulo']) ?>" 
         class="book-cover">
    
    <div class="book-info">
        <h3><?= htmlspecialchars($viewData['livro']['titulo']) ?></h3>
        <br>
        <p><?= htmlspecialchars($viewData['livro']['descricao']) ?></p>
        <br>
        <button class="btn">Adicionar ao carrinho</button>
    </div>
</section>

<br>
<h2>Você também pode gostar de:</h2>
<br><br>

<?php if (!empty($viewData['livrosRelacionados'])): ?>
    <div class="books">
        <?php foreach (
            array_slice($viewData['livrosRelacionados'], 0, 5)
            as $livroRelacionado
        ): ?>
            <div class="book-item">
                <a href="/listing?id=<?= $livroRelacionado['livros_id'] ?>">
                    <img src="<?= htmlspecialchars(
                        $livroRelacionado['url_capa'],
                    ) ?>" 
                         alt="<?= htmlspecialchars(
                             $livroRelacionado['titulo'],
                         ) ?>">
                </a>
                <h3>
                    <a href="/listing?id=<?= $livroRelacionado['livros_id'] ?>">
                        <?= htmlspecialchars($livroRelacionado['titulo']) ?>
                    </a>
                </h3>
                <p class="preco">
                    R$ <?= number_format(
                        $livroRelacionado['preco'],
                        2,
                        ',',
                        '.',
                    ) ?>
                </p>
                <button class="btn">Adicionar ao carrinho</button>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php loadPartial('footer'); ?>
