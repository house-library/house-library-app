<?php loadPartial('head', ['title' => 'Compra Realizada']); ?>
<?php loadPartial('header'); ?>

<?php include __DIR__ . '/../vlibras.html'; ?>

<main class="sucesso-main">
    <div class="sucesso-container">
        <div class="sucesso-icone">
            <i class="fas fa-check-circle"></i>
        </div>

        <h1 class="sucesso-titulo">Sucesso!</h1>

        <p class="sucesso-texto">
            Seu pedido <strong>#<?= $idPedido ?></strong> foi realizado e já está sendo processado.
        </p>

        <div class="sucesso-botoes">
            <a href="/conta" class="btn-ver-pedidos">Ver Meus Pedidos</a>
            <a href="/explorar" class="btn-continuar">Continuar Comprando</a>
        </div>
    </div>
</main>

<?php loadPartial('footer'); ?>
