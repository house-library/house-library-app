<header class="header">
    <div class="container">
        <div class="logo">
            <a href="/">
                <img class="logo" src="/assets/imgs/logo.svg" alt="House Library">
            </a>
        </div>
        
        <button class="btn-mobile-nav" onclick="toggleNav()" aria-label="Abrir menu">
            <i class="fas fa-bars"></i>
        </button>
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
                <a href="/gerenciamento" class="sidebar-link">
                    <span class="material-symbols-outlined">dataset</span>                    
                    <span>Gerenciamento</span>
                </a>
            </li>

            <li>
                <a href="/publicados" class="sidebar-link">
                    <span class="material-symbols-outlined">newsstand</span>
                    <span>Produtos</span>
                </a>
            </li>

            <li>
                <a href="/usuarios" class="sidebar-link">
                    <span class="material-symbols-outlined">group</span>
                    <span>Usuarios</span>
                </a>
            </li>


            <li>
                <a href="/estatisticas" class="sidebar-link">
                    <span class="material-symbols-outlined">analytics</span>
                    <span>Estatisticas</span>
                </a>
            </li>
            <li>
                <a href="/categorias-adm" class="sidebar-link">
                    <span class="material-symbols-outlined">analytics</span>
                    <span>Criar categorias</span>
                </a>
            </li>
        </ul>
    </div>
</header>