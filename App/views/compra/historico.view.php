<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>  

<?php include __DIR__ . '/../vlibras.html'; ?>

    <main class="history-main">
        <h2 class="history-title">Histórico de compras</h2>

        <?php if (empty($livros)): ?>
            <div style="text-align: center; padding: 40px;">
                <p>Você ainda não realizou nenhuma compra.</p>
                <br>
                <a href="/explorar" class="btn-download" style="text-decoration: none; background-color: #243a5a;">Ir para a Loja</a>
            </div>
        <?php else: ?>

            <?php foreach ($livros as $livro): ?>
                <?php
                $basePath = '/assets/capas-pi/';
                $catNome = mb_strtolower($livro['categoria_nome'] ?? '');
                $folder = 'literatura_infantil/';
                if (strpos($catNome, 'fic') !== false) {
                    $folder = 'fic-cientifica/';
                } elseif (strpos($catNome, 'class') !== false) {
                    $folder = 'classicos/';
                } elseif (strpos($catNome, 'roman') !== false) {
                    $folder = 'romance/';
                } elseif (strpos($catNome, 'mister') !== false) {
                    $folder = 'misterio/';
                } elseif (strpos($catNome, 'ajuda') !== false) {
                    $folder = 'autoajuda/';
                }
                $imagePath =
                    $basePath .
                    $folder .
                    ($livro['url_capa'] ?? 'capadefault.svg');
                $downloadLink =
                    '/downloads/livro_' . $livro['livros_id'] . '.pdf';
                ?>

                <section class="purchase-item">
                    <div class="book-cover-container">
                        <img src="<?= htmlspecialchars($imagePath) ?>" 
                             alt="Capa do livro <?= htmlspecialchars(
                                 $livro['titulo'],
                             ) ?>" 
                             width="100">
                    </div>
                    <div class="book-details">
                        <h3><?= htmlspecialchars($livro['titulo']) ?></h3>
                        <p class="book-author"><?= htmlspecialchars(
                            $livro['nome_autor'],
                        ) ?></p>
                        <p class="book-price"><strong>R$ <?= number_format(
                            $livro['preco'],
                            2,
                            ',',
                            '.',
                        ) ?></strong></p>
                        
                        <p style="font-size: 12px; color: #888; margin-top: 5px;">
                            Comprado em: <?= date(
                                'd/m/Y',
                                strtotime($livro['data_pedido']),
                            ) ?>
                        </p>
                    </div>
                    <div class="action-button">
                        <a href="<?= $downloadLink ?>" download class="btn-download" style="text-decoration: none; display: inline-block; text-align: center;">Download</a>
                    </div>
                </section>

            <?php endforeach; ?>

        <?php endif; ?>

        
   <?php loadPartial('pagination', [
        'paginaAtual' => $paginaAtual,
        'totalPaginas' => $totalPaginas
    ]); ?>

        
    </main>

<?php loadPartial('footer'); ?>
