<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<div class="header-login">
    <nav>
        <ul class="nav-list">
            <li><a href="/" class="nav-link">Início</a></li>

            <?php if (
                isset($_SESSION['cliente']) &&
                $_SESSION['cliente'] === true
            ): ?>
                    <li>
                        <a href="/logout" class="nav-link">Sair</a>
                    </li>
                    
                    <li class="user-menu">
                    <div class="user-info">
                        <img src="/assets/imgs/account_circle.svg" alt="Usuario">
                        <span>Olá, <?= htmlspecialchars(
                            $_SESSION['nome'],
                        ) ?></span>
                    </div>
                    </li>
                    <?php else: ?>
                        <li><a href="/login" class="nav-link">Login</a></li>
                        <li><a href="/cadastro" class="nav-link btn-destaque">Cadastrar</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
             
<header class="header">
    <div class="overlay"></div>

    <div class="container desktop-header">
        <div class="logo">
            <a href="./index.php">
                <img src="/assets/imgs/logo.svg" alt="House Library">
            </a>
        </div>

        <div class="search-bar">
            <form action="/buscar" method="GET" class="search-form" role="search">
                <input type="search" class="search-input" name="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-submit" aria-label="Buscar"></button>
            </form>
        </div>

        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="./views/favoritos.view.php" class="nav-link"><span>Favoritos</span></a></li>
                <li><a href="./views/carrinho.view.php" class="nav-link"><span>Carrinho</span></a></li>
                <li><a href="/controllers/explorar.php" class="nav-link"><span>Explorar</span></a></li>
                <li><a href="/controllers/conta.php" class="nav-link"><span>Conta</span></a></li>
            </ul>
        </nav>
    </div>

    <div class="mobile-header">
        <div class="top-bar">
            <button class="btn-mobile-nav" onclick="toggleNav()" aria-label="Abrir menu">
                <i class="fas fa-bars"></i>
            </button>

            <div class="logo-mobile">
                <a href="./index.php">
                    <img src="/assets/imgs/logo.svg" alt="House Library">
                </a>
            </div>

            <a href="./views/carrinho.view.php" class="cart-btn">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </a>
        </div>

        <div class="search-container-mobile">
            <form action="/buscar" method="GET" class="search-form-mobile" role="search">
                <input type="search" class="search-input-mobile" name="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-submit-mobile" aria-label="Buscar">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Menu</h3>
            <button class="toggle-btn" onclick="toggleNav()" aria-label="Fechar menu">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <ul class="sidebar-list">
            <li>
                <a href="./index.php" class="sidebar-link">
                    <span class="material-symbols-outlined">home</span>
                    <span>Início</span>
                </a>
            </li>

            <li>
                <a href="./views/favoritos.view.php" class="sidebar-link">
                    <span class="material-symbols-outlined">favorite</span>
                    <span>Favoritos</span>
                </a>
            </li>

            <li>
                <a href="./views/carrinho.view.php" class="sidebar-link">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span>Carrinho</span>
                </a>
            </li>

            <li class="dropdown">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <span class="dropdown-label">
                        <span class="material-symbols-outlined">label</span>
                        <span>Categorias</span>
                    </span>
                    <span class="material-symbols-outlined arrow">arrow_drop_down</span>
                </button>

                <ul class="sub-menu">
                    <li><a href="/aventuras">Aventuras</a></li>
                    <li><a href="/infantis">Infantis</a></li>
                    <li><a href="/literatura-classica">Literatura Clássica</a></li>
                    <li><a href="/biografias">Biografias</a></li>
                    <li><a href="/cultura">Cultura</a></li>
                    <li><a href="/ciencia">Ciência</a></li>
                </ul>
            </li>

            <li>
                <a href="/controllers/explorar.php" class="sidebar-link">
                    <span class="material-symbols-outlined">explore</span>
                    <span>Explorar</span>
                </a>
            </li>

            <li>
                <a href="/controllers/conta.php" class="sidebar-link">
                    <span class="material-symbols-outlined">settings</span>
                    <span>Conta</span>
                </a>
            </li>
        </ul>
    </div>
</header>
