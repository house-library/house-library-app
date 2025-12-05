<?php
$is_admin_page = true;

loadPartial('head', $data);
include __DIR__ . '/../vlibras.html';
loadPartial('headeradm'); 
?>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
<style>
    .dataTables_wrapper { padding: 20px; }
    select { margin-bottom: 10px; }
</style>

<main>
    <div class="container">
        <h1 class="title-text">Gerenciar Clientes</h1>
    </div>

    <div class="divider"></div>

    <div class="table-products">
        <table id="tabela" class="content-table">
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
                            <td><?= (int) $cli['cliente_id'] ?></td>
                            <td><?= htmlspecialchars($cli['nome_cliente']) ?></td>
                            <td><?= htmlspecialchars($cli['email_cliente']) ?></td>
                            <td><?= htmlspecialchars($cli['cpf_cliente']) ?></td>
                            <td><?= htmlspecialchars($cli['status'] ?? 'Desconhecido') ?></td>
                            <td class="btn-action">
                                <form method="post" action="/clientes/<?= (int) $cli['cliente_id'] ?>" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="excluir">Excluir</button>
                                </form>
                                <a href="/compras/cliente/<?= (int) $cli['cliente_id'] ?>" class="btn-ver">Ver Histórico</a>
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