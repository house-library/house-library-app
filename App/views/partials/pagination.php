<?php
$paginaAtual = $paginaAtual ?? 1;
$totalPaginas = $totalPaginas ?? 1;

$queryParams = $_GET;
unset($queryParams['pg']);
$queryString = http_build_query($queryParams);
$prefix = !empty($queryString) ? '&' : '';
?>

<?php if ($totalPaginas > 1): ?>
    <ul class="pagination">
        
        <?php if ($paginaAtual > 1): ?>
            <li>
                <a href="?pg=<?= ($paginaAtual - 1) . $prefix . $queryString ?>">&laquo; Anterior</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <li>
                <a href="?pg=<?= $i . $prefix . $queryString ?>" 
                   class="<?= ($i == $paginaAtual) ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <?php if ($paginaAtual < $totalPaginas): ?>
            <li>
                <a href="?pg=<?= ($paginaAtual + 1) . $prefix . $queryString ?>">Próxima &raquo;</a>
            </li>
        <?php endif; ?>

    </ul>
<?php endif; ?>