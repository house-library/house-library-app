<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?> 

<?php include __DIR__ . '/../vlibras.html'; ?>

<?php
$livro = $livro ?? [];
$livrosRelacionados = $livrosRelacionados ?? [];
$basePath = '/assets/capas-pi/';
$categoryName = $livro['categoria_nome'] ?? '';
if ($categoryName === 'Ficção') {
    $folder = 'fic-cientifica/';
} elseif ($categoryName === 'classicos') {
    $folder = 'classicos/';
} elseif ($categoryName === 'Romance') {
    $folder = 'romance/';
} elseif ($categoryName === 'misterio') {
    $folder = 'misterio/';
} elseif ($categoryName === 'Auto-ajuda') {
    $folder = 'autoajuda/';
}
$mainImagePath =
    $basePath . $folder . ($livro['url_capa'] ?? 'capadefault.svg');
$row = array_slice($livrosRelacionados, 0, 5);
?>

<main>
    <div class="ebook-container">
        <section class="ebook">
            <a href="/detalhes?id<?= $livro['livros_id'] ?? '' ?>">
            <img src="<?= htmlspecialchars(
                $mainImagePath,
            ) ?>" alt="<?= htmlspecialchars(
    $livro['titulo'] ?? 'Livro',
) ?>" class="book-cover">
            </a>
    
            <div class="book-info">
            <h3 class='title-book'><?= htmlspecialchars(
                $livro['titulo'] ?? '',
            ) ?></h3>
            <p class="book-author"><?= htmlspecialchars(
                $livro['nome_autor'] ?? '',
            ) ?></p>
            <p class="desc-book"><?= htmlspecialchars(
                $livro['descricao'] ?? '',
            ) ?></p>
            </div>
        </section>
        
        <aside class="cart-summary">
            <div class="value-summary">
                <div class="total-value">
                    <h3>Total:</h3>
                    <h3>R$ <?= number_format(
                        $livro['preco'] ?? 0,
                        2,
                        ',',
                        '.',
                    ) ?></h3>
                </div>
                <a class="buy-btn" href="/pagamento/add?id=<?= $livro[
                    'livros_id'
                ] ?>">Finalizar compra</a>    
                <a class="summary-btn" href="/carrinho/add?id=<?= $livro[
                    'livros_id'
                ] ?>">Adicionar ao carrinho</a>                
                <a class="summary-btn" href="/favoritos/add?id=<?= $livro[
                    'livros_id'
                ] ?>">Adicionar em favoritos</a>   
            </div>
        </aside>
    </div>

    
    
    
    <h2 class="title-grid">Você também pode gostar de:</h2>
    <div class="books">
        <?php foreach ($row as $relatedBook): ?>
            <?php
            $relBasePath = '/assets/capas-pi/';
            $relCatName = $relatedBook['categoria_nome'] ?? '';
            if ($relCatName === 'Ficção') {
                $relFolder = 'fic-cientifica/';
            } elseif ($relCatName === 'classicos') {
                $relFolder = 'classicos/';
            } elseif ($relCatName === 'Romance') {
                $relFolder = 'romance/';
            } elseif ($relCatName === 'misterio') {
                $relFolder = 'misterio/';
            } elseif ($relCatName === 'Auto-ajuda') {
                $relFolder = 'autoajuda/';
            } else {
                $relFolder = '';
            }
            $relImgPath =
                $relBasePath .
                $relFolder .
                ($relatedBook['url_capa'] ?? 'capadefault.svg');
            ?>
            
            <div class="books-grid">
                <a href="/detalhes?id<?= $relatedBook['livros_id'] ?>">
                    <img class="img-grid" src="<?= htmlspecialchars(
                        $relImgPath,
                    ) ?>" 
                         alt="<?= htmlspecialchars($relatedBook['titulo']) ?>">
                    <p><?= htmlspecialchars($relatedBook['titulo']) ?></p>
                    <p class="book-author"><?= htmlspecialchars(
                        $livro['nome_autor'] ?? '',
                    ) ?><p>
                    <p>R$ <?= number_format(
                        $livro['preco'] ?? 0,
                        2,
                        ',',
                        '.',
                    ) ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php loadPartial('footer'); ?> 
