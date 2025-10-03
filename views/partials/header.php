<header class="header">

        <a href="/controllers/inicio.php">
            <img class="logo" src="/public/assets/imgs/logo.svg" alt="House Library">
        </a>


<nav class="sidebar-nav" id="sidebar">
    <button
        class="sidebar-nav__burguer"
        aria-label="Abrir menu lateral"
        aria-expanded="false"
        aria-controls="sidebar-menu-list"
    >
        <img src="/public/assets/header-icons/menu.svg" alt="" aria-hidden="true" />
    </button>

    <ul class="sidebar-nav__list" id="sidebar-menu-list">
        <li class="sidebar-nav__item">
            <a class="sidebar-nav__link" href="/controllers/inicio.php">
                <img class="sidebar-nav__icon" src="/public/assets/header-icons/Inicio.svg" alt="Inicio">
                <span class="sidebar-nav__text">Inicio</span>
            </a>
        </li>
        <li class="sidebar-nav__item">
            <a class="sidebar-nav__link" href="/controllers/explorar.php">
                <img class="sidebar-nav__icon" src="/public/assets/header-icons/Explorar.svg" alt="Explorar">
                <span class="sidebar-nav__text">Explorar</span>
            </a>
        </li>
        <li class="sidebar-nav__item">
            <a class="sidebar-nav__link" href="/controllers/historico.php">
                <img class="sidebar-nav__icon" src="/public/assets/header-icons/Historico.svg" alt="Historico de compras">
                <span class="sidebar-nav__text">Historico de compras</span>
            </a>
        </li>
        <li class="sidebar-nav__item">
            <a class="sidebar-nav__link" href="/controllers/favoritos.php">
                <img class="sidebar-nav__icon" src="/public/assets/header-icons/favoritos.svg" alt="Favoritos">
                <span class="sidebar-nav__text">Favoritos</span>
            </a>
        </li>
    </ul>
</nav>

            <form action="/buscar" method="GET" class="search-form" role="search">
                <label for="search-input"></label>
                <input type="search" id="search-input" name="search-input" class="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-button"><img src="/public/assets/header-icons/lupa.svg" alt="Buscar"></button>
            </form>

         <nav class="header-nav">
    <ul class="header-nav__list">
        <li class="header-nav__item">
            <a class="header-nav__link" href="/controllers/favoritos.php" aria-label="Favoritos">
                <p>Favoritos</p>
            </a>
        </li>
        <li>
            <a class="header-nav__link" href="/controllers/carrinho.php" aria-label="Carrinho de compras">
                <p>Carrinho</p>
            </a>
        </li>
        <li class="header-nav__item">
            <a class="header-nav__link" href="/controllers/explorar.php" aria-label="Explorar">
                <p>Explorar</p>
            </a>
        </li>
        <li class="header-nav__item">
            <a class="header-nav__link" href="/controllers/conta.php" aria-label="Minha conta">
                <p>Conta</p>
            </a>
        </li>
    </ul>
</nav>
        
    </header>