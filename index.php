<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/partials/styles/reset.css">
    <link rel="stylesheet" href="./views/partials/styles/header.css">
    <link rel="stylesheet" href="./views/partials/styles/footer.css">
    <link rel="stylesheet" href="./views/partials/styles/inicio.css">
</head>
<body>
    <?php require './views/partials/header.php'; ?>
    
    <main class="main">
        
           <div class="hero-image">
                <img src="./public/assets/imgs/House_Library_banner.png" alt="Biblioteca ao fundo com logo da House Library a frente">
            </div>
        
        
        <div class="container">
        
        <section class="section-category">
            <ul class="ul-category">
                <li class="li-category"><a class="category-link" href="/aventuras">Aventuras</a></li>
                <li class="li-category"><a class="category-link" href="/infantis">Infantis</a></li>
                <li class="li-category"><a class="category-link" href="/literatura-classica">Literatura Clássica</a></li>
                <li class="li-category"><a class="category-link" href="/biografias">Biografias</a></li>
                <li class="li-category"><a class="category-link" href="/cultura">Cultura</a></li>
                <li class="li-category"><a class="category-link" href="/ciencia">Ciência</a></li>
            </ul>
        </section>

        <section class="section-ebooks">
            <h2>Aventuras</h2>
            <a href="/destaques.html" class="more-btn">Ver mais</a>
        </section>

    <section class="section-ebooks">
            <h2>Infantis</h2>
            <a href="/destaques.html" class="more-btn">Ver mais</a>
        </section>

        <section class="banner">
            <img src="./public/assets/imgs/banner-2.png" alt="">
        </section>

    <section class="section-ebooks">
            <h2>Literatura clássica</h2>
            <a href="/destaques.html" class="more-btn">Ver mais</a>
        </section>

    <section class="section-ebooks">
            <h2>Biografias</h2>
            <a href="/destaques.html" class="more-btn">Ver mais</a>
        </section>
        
        <section class="banner">
            <img src="./public/assets/imgs/banner-3.png" alt="">
        </section>

         <section class="section-ebooks">
            <h2>Cultura</h2>
            <a href="/destaques.html" class="more-btn">Ver mais</a>
        </section>

         <section class="section-ebooks">
            <h2>Ciência</h2>
            <a href="/destaques.html" class="more-btn">Ver mais</a>
        </section>
        </div>
    </main>


    <?php require './views/partials/footer.php'; ?>
</body>
</html>