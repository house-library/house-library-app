<?php loadPartial('head', $viewData); ?>
<?php loadPartial('headeradm'); ?>    

<?php include __DIR__ . '/../vlibras.html'; ?>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">

<main>
    <div class="container">
        <h1 class="title-text">Gerenciar E-books</h1>
    </div>

    <div class="divider"></div>

    <div class="table-products">
        <div class="table-wrapper">
            <table id="tabela" class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Faixa-Etaria</th>
                        <th>Preço</th>
                        <th>Autor</th>
                        <th>Idioma</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (isset($livros) && is_iterable($livros)): ?>
                        <?php foreach ($livros as $livro): ?>
                            <tr>
                                <td><?= (int) $livro['livros_id'] ?></td>
                                <td><?= htmlspecialchars(
                                    $livro['titulo'],
                                ) ?></td>
                                <td><?= htmlspecialchars(
                                    $livro['categoria_nome'],
                                ) ?></td>
                                <td><?= htmlspecialchars(
                                    $livro['faixa_etaria'],
                                ) ?></td>
                                <td><?= number_format(
                                    (float) $livro['preco'],
                                    2,
                                    ',',
                                    '.',
                                ) ?></td>
                                <td><?= htmlspecialchars(
                                    $livro['nome_autor'],
                                ) ?></td>
                                <td><?= htmlspecialchars(
                                    $livro['idioma'],
                                ) ?></td>

                                <td class="btn-action">
                                    <a href="/listings/edit/<?= $livro[
                                        'livros_id'
                                    ] ?>" class="editar">Editar</a>

                                    <form method="post" action="/listings/<?= $livro[
                                        'livros_id'
                                    ] ?>" onsubmit="return confirm('Tem certeza que deseja excluir o livro <?= htmlspecialchars(
    $livro['titulo'],
) ?>?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="excluir">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
<script src="/js/datatable.js"></script>

<?php loadPartial('footer'); ?>
