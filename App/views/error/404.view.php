<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>    

<?php include __DIR__ . '/../vlibras.html'; ?>

<main class="main">
    <section class="section">
        <h1 class="error-title">Página não encontrada</h1>
        
        <img src="/assets/imgs/404error.svg" alt="Erro 404" class="error-image">
        
        <a href="/explorar" class="btn-explorar">Ver todos os livros</a>
    </section>
</main>

<?php loadPartial('footer'); ?>