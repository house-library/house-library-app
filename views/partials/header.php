<header>

        <nav id="sidebar">
        <div id="menu-burguer">
          <button
            id="menu-burguer"
            aria-label="Abrir menu lateral"
            aria-expanded="false"
            aria-controls="siderbar"
          >
            <img src="/assets/header-icons/menu.svg" alt="" aria-hidden="true" />
          </button>
        </div>


            <ul id="side-items">
                <li class="side-item">
                    <a href="/inicio.html">
                        <img src="/assets/header-icons/Inicio.svg" alt="Inicio">
                        <span class="menu-description">Inicio</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="/explorar.html">
                        <img src="/assets/header-icons/Explorar.svg" alt="Explorar">
                        <span class="menu-description">Explorar</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="/historico.html">
                        <img src="/assets/header-icons/Historico.svg" alt="Historico de compras">
                        <span class="menu-description">Historico de compras</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="/favoritos.html">
                        <img src="/assets/header-icons/Favoritos.svg" alt="Favoritos">
                        <span class="menu-description">Favoritos</span>
                    </a>
                </li>
            </ul>
        </nav>

        <a href="inicio.html" class="logo">
            <img src="/assets/logo.svg" alt="House Library">
        </a>

            <form action="/buscar" method="GET" class="search-form" role="search">
                <label for="search-input"></label>
                <input type="search" id="search-input" name="search-input" class="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-button"><img src="/assets/header-icons/lupa.svg" alt="Buscar"></button>
            </form>

            <nav>
                <ul>
                    <li class="nav-icon">
                        <a href="/carrinho.html" title="Carrinho de compras">
                            <img src="/assets/header-icons/carrinho.svg" alt="Icone de carrinho de compras">
                        </a>
                    </li>
                     <li class="nav-icon">
                        <a href="/conta.html" title="Conta">
                            <img src="/assets/header-icons/conta.svg" alt="Icone da conta do usuário">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>