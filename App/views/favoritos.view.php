<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>    

  <main class="favorites-main">
    <h2 class="favorites-title">Favoritos</h2>

    <section class="favorite-item">
      <div class="item-details-container">
        <div class="book-cover-container">
          <img src="/assets/capa-pi/misterio/ateofim" alt="Capa do livro Até o Fim" width="120">
        </div>
        <div class="book-info">
          <p class="book-author"><strong>Michael Lowy</strong></p>
          <h3>Argonauta</h3>
          <div class="book-rating">
            <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> (6)
          </div>
          <p class="book-description">
            Você é o último. Seu mundo foi aniquilado, apagado da existência como se nunca tivesse existido.
            Mas você ainda respira. Em meio ao vazio infinito, uma cidade impossível surge diante de você: NUO,
            o refúgio dos perdidos, o lar daqueles que sobreviveram ao fim de sua realidade.
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
