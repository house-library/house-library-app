 <?php 
 require '../views/partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Favoritos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="../views/partials/styles/reset.css">
 <link rel="stylesheet" href="../views/partials/styles/header.css">
 <link rel="stylesheet" href="../views/partials/styles/footer.css">
 <link rel="stylesheet" href="../views/partials/styles/favoritos.css">
</head>

<body>
  <main class="favorites-main">
    <h2 class="favorites-title">Favoritos</h2>

    <section class="favorite-item">
      <div class="item-details-container">
        <div class="book-cover-container">
          <img src="caminho/para/argonauta.jpg" alt="Capa do livro Argonauta" width="120">
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

  </main>
</body>