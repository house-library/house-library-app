<?= loadPartial('head', $viewData) ?>

<?= loadPartial('header') ?>    

<main class="main">
        
           <div class="hero-image">
                <img src="/assets/imgs/House_Library_banner.png" alt="Biblioteca ao fundo com logo da House Library a frente">
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
            <img src="/assets/imgs/banner-2.png" alt="">
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
            <img src="/assets/imgs/banner-3.png" alt="">
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


    <script src="/js/header.js"></script>
<?= loadPartial('footer') ?>    