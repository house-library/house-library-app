<header class="header">
    <div class="container">
        <div class="logo">
            <a href="./index.php">
                <img class="logo" src="/house-library-app/public/assets/imgs/logo.svg" alt="House Library">
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
                        <a href="./views/favoritos.view.php" class="nav-link" aria-label="Favoritos">
                            <span>Favoritos</span>
                        </a>
                    </li>
                    <li>
                        <a href="./views/carrinho.view.php" class="nav-link" aria-label="Carrinho de compras">
                            <span>Carrinho</span>
                        </a>
                    </li>
                    <li>
                        <a href="/controllers/explorar.php" class="nav-link" aria-label="Explorar">
                            <span>Explorar</span>
                        </a>
                    </li>
                    <li>
                        <a href="/controllers/conta.php" class="nav-link" aria-label="Minha conta">
                            <span>Conta</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>