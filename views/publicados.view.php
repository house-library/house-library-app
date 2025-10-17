<?php require 
'../views/partials/headeradm.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../views/partials/styles/reset.css">
    <link rel="stylesheet" href="../views/partials/styles/headeradm.css">
    <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/publicados.css">
</head>

<body>
    <main class="main-content">
     <header class="top-bar">    
         </div>
         <div class="search-bar">
            <form action="/buscar" method="GET" class="search-form" role="search">
                <input type="search" class="search-input" name="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-submit" aria-label="Buscar"></button>
            </form>
        </div>
        <button class="new-ebook">+ Novo e-book</button>
        <br><br>
        <button class="painel">Painel de estatísticas</button>
      </header>
        <br>
        <br>

        <section class="book-list">
        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/ateofim.png" alt="Até o fim">
          <div class="book-info">
            <h3>Até o fim</h3>
            <p>10 capítulos</p>
            <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>
        
        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>8 capitulos</p>
               <p>Ficção cientifica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/arepublica.png" alt="A república">
          <div class="book-info">
               <h3>A república</h3>
               <p>9 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>
</body>
</html>

<?php require 'partials/footer.php'; ?>