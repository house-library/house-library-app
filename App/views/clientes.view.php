<?php echo '<!-- clientes.view.php foi carregada -->'; ?>

<?php loadPartial('head', $data); ?>
<?php loadPartial('headeradm'); ?>

<main>
    <div class="container">
        <h1 class="title-text">Gerenciar Clientes</h1>
    </div>

    <div class="divider"></div>

    <div class="table-products">
        <table>
            <thead class="title-table">
                <tr class="info-table">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($clientes) && is_iterable($clientes)): ?>
                    <?php foreach ($clientes as $cli): ?>
                        <tr class="info-table">
                            <td><?= (int) $cli->cliente_id ?></td>
                            <td><?= htmlspecialchars($cli->nome_cliente) ?></td>
                            <td><?= htmlspecialchars(
                                $cli->email_cliente,
                            ) ?></td>
                            <td><?= htmlspecialchars($cli->cpf_cliente) ?></td>
                            <td><?= htmlspecialchars(
                                $cli->ativo ?? 'Desconhecido',
                            ) ?></td> <!-- Ajuste o nome do campo se necessário -->
                            <td class="btn-action">
                                <form method="post" action="/clientes/<?= (int) $cli->cliente_id ?>" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="excluir">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhum cliente encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</main>

<?php loadPartial('footer'); ?>
