<?php
require 'partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="../views/partials/styles/reset.css">
    <link rel="stylesheet" href="../views/partials/styles/header.css">
    <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/detalhes.css">
</head>

<body>
    <section class="ebook">
      <img src="/public/assets/capas-pi/classicos/20milleguas.png" alt="Vinte mil léguas submarinas" class="book-cover">
      <div class="book-info">
        <h3>Vinte mil léguas submarinas</h3>
        <br>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta vero eligendi laudantium perspiciatis possimus illum. Officia blanditiis cum aliquid dolore voluptatum laboriosam minus nisi optio. Quidem quod sunt dignissimos temporibus!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta vero eligendi laudantium perspiciatis possimus illum. Officia blanditiis cum aliquid dolore voluptatum laboriosam minus nisi optio. Quidem quod sunt dignissimos temporibus!
        </p>
        <br>
        <button class="btn">Adicionar ao carrinho</button>
      </div>
    </section>
    
    <br>
    <H2>Você também pode gostar de:</H2>
    <br><br>

    <div class="books">
  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/arepublica.png" alt="A república">
    <h3>A república</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/dracula.png" alt="Drácula">
    <h3>Drácula</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/iliada.png" alt="A Ilíada">
    <h3>A Ilíada</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/ilhatesouro.png" alt="A ilha do tesouro">
    <h3>A ilha do tesouro</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/odisseia.png" alt="A odisseia">
    <h3>A odisseia</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>
</div>

   <div class="books">
  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/fausto.png" alt="Fausto">
    <h3>Fausto</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/principe.png" alt="O príncipe">
    <h3>O príncipe</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/paraisoperdido.png" alt="Paraíso perdido">
    <h3>Paraíso perdido</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/cartasportuguesas.png" alt="A ilha do tesouro">
    <h3>Cartas portuguesas</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>

  <div class="book-item">
    <img src="/public/assets/capas-pi/classicos/orgulhoepreconceito.png" alt="Orgulho e preconceito">
    <h3>Orgulho e preconceito</h3>
    <button class="btn">Adicionar ao carrinho</button>
  </div>
</div>
    
    
</body>
</html>
    
        <?php require 'partials/footer.php'; ?>


