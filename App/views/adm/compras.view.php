<?php
$is_admin_page = true;

loadPartial('head', $data);
include __DIR__ . '/../vlibras.html';
loadPartial('headeradm'); 
?>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
<style>
    .dataTables_wrapper { padding: 20px; }
</style>

<main>
    <div class="container">
        <h1 class="title-text">Compras de <?= htmlspecialchars($nome_cliente) ?></h1>
    </div>

    <div class="divider"></div>

    <div class="table-products">
        <table id="tabela" class="content-table">
            <thead class="title-table">
                <tr class="info-table">
                    <th>ID Pedido</th>
                    <th>Data</th>
                    <th>Livros Comprados</th> 
                    <th>Valor Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($compras) && !empty($compras)): ?>
                    <?php foreach ($compras as $compra): ?>
                        <tr class="info-table">
                            <td>#<?= (int) $compra['pedidos_id'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($compra['data_pedido'])) ?></td>
                            
                            <td>
                                <?= htmlspecialchars($compra['livros_nomes']) ?>
                            </td>

                            <td>R$ <?= number_format((float)$compra['valor_total'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($compra['status_pedido']) ?></td>
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