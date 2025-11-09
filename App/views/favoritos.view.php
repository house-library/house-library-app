<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>    

<?php include ("vlibras.html");?>

  <main class="favorites-main">
    <h2 class="favorites-title">Favoritos</h2>

    <section class="favorite-item">
        <div class="book-item">
    <img src="/assets/capas-pi/classicos/paraisoperdido.png" alt="A Ilíada">
        </div>
        <div class="book-info">
          <p class="book-author"><strong>John Milton</strong></p>
          <h3>Paraíso perdido</h3>
          <div class="book-rating">
            <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> (6)
          </div>
          <p class="book-description">
            “Ela o toca, ela o arranca, e logo o come. A terra estremeceu com tal ferida; Desde os cimentos seus a natureza, Pela extensão das maravilhas suas, Aflita suspirou, sinais mostrando Da ampla desgraça e perdição de tudo.” Esta edição segue a tradução original de Lima Leitão, publicada em 1840, restituindo versos emendados por edições subsequentes à sua forma original.
          </p>
        </div>
      </div>

      <div class="item-action-box">
        <p class="item-price"><strong>R$ 20,00</strong></p>
        <button class="btn-add-to-cart">Adicionar ao carrinho</button>
      </div>
    </section>
    
    <div class="pagination">
      <a href="#" class="arrow">&lt;</a>
      <a href="#" class="active">1</a>
      <a href="#" class="arrow">&gt;</a>
    </div>

  <?php loadPartial('footer'); ?>    
