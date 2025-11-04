<?= loadPartial('head', $viewData) ?>
<?= loadPartial('header') ?>  

    <main class="history-main">
        <h2 class="history-title">Histórico de compras</h2>

        <section class="purchase-item">
            <div class="book-cover-container">
                <img src="/assets/capas-pi/classicos/principe.png" alt="Capa do livro Creator's Call" width="100">
            </div>
            <div class="book-details">
                <h3>Creator´s Call</h3>
                <p class="book-author">John Doe</p>
                <p class="book-price"><strong>R$ 20,00</strong></p>
            </div>
            <div class="action-button">
                <button class="btn-download">Download</button>
            </div>
        </section>

        <section class="purchase-item">
            <div class="book-cover-container">
                <img src="/assets/capas-pi/classicos/principe.png" alt="Capa do livro Argonauta" width="100">
            </div>
            <div class="book-details">
                <h3>Argonauta</h3>
                <p class="book-author">Michael Lowy</p>
                <p class="book-price"><strong>R$ 20,00</strong></p>
            </div>
            <div class="action-button">
                <button class="btn-download">Download</button>
            </div>
        </section>
    </main>


<?= loadPartial('footer') ?>    
