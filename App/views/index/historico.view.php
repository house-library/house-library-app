<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>  

<?php include (__DIR__ . "/../vlibras.html");?>

    <main class="history-main">
        <h2 class="history-title">Histórico de compras</h2>

        <section class="purchase-item">
            <div class="book-cover-container">
                <img src="/assets/capas-pi/classicos/arepublica.png" alt="Capa do livro Creator's Call" width="100">
            </div>
            <div class="book-details">
                <h3>A república</h3>
                <p class="book-author">Platâo</p>
                <p class="book-price"><strong>R$ 8,50</strong></p>
            </div>
            <div class="action-button">
                <button class="btn-download">Download</button>
            </div>
        </section>

        <section class="purchase-item">
            <div class="book-cover-container">
                <img src="/assets/capas-pi/misterio/olharesmare.png" alt="Capa do livro Argonauta" width="100">
            </div>
            <div class="book-details">
                <h3>Olhares na maré</h3>
                <p class="book-author">Leigh Vale</p>
                <p class="book-price"><strong>R$ 8,50</strong></p>
            </div>
            <div class="action-button">
                <button class="btn-download">Download</button>
            </div>
        </section>
    </main>


<?php loadPartial('footer'); ?>    
