<?php loadPartial('head', $data); ?>
<?php loadPartial('headeradm'); ?>

<main>
    <div class="container">
        <h1 class="title-text">Categorias</h1>
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
                <a href="/categoriasadm" class="btn-cancelar">Cancelar Edição</a>
            </form>
        </div>
    <?php else: ?>
        <div class="input-label">
            <h2>Nova Categoria</h2>
            <form action="/categoriasadm" method="post">
                <input type="hidden" name="action" value="create">
                <label for="descricao_create">Descrição:</label>
                <input type="text" id="descricao_create" name="descricao" required>
                <label for="status_create">Status:</label>
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
        <table>
            <thead class="title-table">
                <tr class="info-table">
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Total de livros</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($categorias) && is_iterable($categorias)): ?>
                    <?php foreach ($categorias as $cat): ?>
                        <tr class="info-table">
                            <td><?= htmlspecialchars(
                                $cat->descricao ?? 'N/A',
                            ) ?></td>
                            <td><?= htmlspecialchars(
                                $cat->status ?? 'N/A',
                            ) ?></td> 
                            <td>0</td> 
                            <td class="btn-action">
                                <a href="/categoriasadm/edit/<?= (int) $cat->categoria_id ?>" class="editar">Editar</a>
                                <form method="post" action="/categoriasadm/<?= (int) $cat->categoria_id ?>" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="excluir">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhuma categoria encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</main>

<?php loadPartial('footer'); ?>
