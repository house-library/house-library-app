<header class="header">
    <div class="container">
        <div class="logo">
            <a href="/controllers/inicio.php">
                 <link rel="stylesheet" href="/views/partials/styles/reset.css">
    <link rel="stylesheet" href="/house-library-app/views/partials/styles/headeradm.css">
    
                <img class="logo" src="../public/assets/imgs/logo.svg" alt="House Library">
            </a>
        </div>
        
        <div class="search-bar">
            <form action="/buscar" method="GET" class="search-form" role="search">
                <input type="search" class="search-input" name="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-submit" aria-label="Buscar"></button>
            </form>
        </div>

        <div class="header-nav">
            <nav class="main-nav">
                <ul class="nav-list">
                    <li>
                        <a href="../controllers/publicados.php" class="nav-link" aria-label="Favoritos">
                            <span>Livros Publicados</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controllers/conta.php" class="nav-link" aria-label="Minha conta">
                            <span>Conta</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>