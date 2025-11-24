<?php loadPartial('head', $data); ?>
<?php loadPartial('headeradm'); ?>

<link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">

<?php include __DIR__ . '/../vlibras.html'; ?>

<main>
    <div class="container">
        <h1 class="title-text">Gerenciar Categorias</h1>
    </div>

    <div class="divider"></div>

    <?php if (isset($categoria) && $categoria): ?>
        <div class="input-label">
            <h2>Editar Categoria</h2>
            <form action="/categoriasadm" method="post">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="categoria_id" value="<?= (int) $categoria->categoria_id ?>">
                
                <label for="descricao_edit">Descrição:</label>
                <input type="text" id="descricao_edit" name="descricao" value="<?= htmlspecialchars(
                    $categoria->descricao,
                ) ?>" required>
                
                <label for="status_edit">Status:</label>
                <select id="status_edit" name="status" required>
                    <option value="A" <?= $categoria->status === 'A'
                        ? 'selected'
                        : '' ?>>Ativo</option>
                    <option value="I" <?= $categoria->status === 'I'
                        ? 'selected'
                        : '' ?>>Inativo</option>
                </select>
                
                <button class="btn-atualizar" type="submit">Atualizar Categoria</button>
                <a href="/categoriasadm" class="btn-cancelar">Cancelar</a>
            </form>
        </div>
    <?php else: ?>
        <div class="input-label">
            <h2 class="input-title">Nova Categoria</h2>
            <form action="/categoriasadm" method="post">
                <input type="hidden" name="action" value="create">
                
                <label for="descricao_create" class="input-label">Descrição:</label>
                <input type="text" id="descricao_create" name="descricao" placeholder="Ex: Ficção Científica" required>
                
                <label for="status_create" class="input-label">Status:</label>
                <select id="status_create" name="status" required>
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
                </select>
                
                <button class="btn-cadastrar" type="submit">Cadastrar Categoria</button>
            </form>
        </div>
    <?php endif; ?>

    <div class="divider"></div>

    <div class="table-products">
        <table id="tabela" class="content-table">
            <thead class="title-table">
                <tr class="info-table">
                    <th>ID</th> <th>Descrição</th>
                    <th>Total Livros</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($categorias) && is_iterable($categorias)): ?>
                    <?php foreach ($categorias as $cat): ?>
                        <tr class="info-table">
                            <td><?= (int) $cat['categoria_id'] ?></td>
                            <td><?= htmlspecialchars(
                                $cat['descricao'] ?? 'N/A',
                            ) ?></td>
                            <td><?= (int) $cat['total_livros'] ?></td>
                             <td><?= htmlspecialchars(
                                 $status = $cat['status'] ?? 'I',
                             ) ?></td>
                             <td class="btn-action">
                                <a href="/categoriasadm/edit/<?= (int) $cat[
                                    'categoria_id'
                                ] ?>" class="editar">Editar</a>
                                <form method="post" action="/categorias-adm/<?= (int) $cat[
                                    'categoria_id'
                                ] ?>" style="display:inline;" onsubmit="return confirm('Tem certeza?');">
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
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
<script src="/js/datatable.js"></script>

<?php loadPartial('footer'); ?>
