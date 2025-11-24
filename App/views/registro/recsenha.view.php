<?php loadPartial('head', $viewData); ?>

<?php include __DIR__ . '/../vlibras.html'; ?>

<body>
    <div class="main-login">
    <div class="right-login">
        <div class="card-login">
            <img src="/assets/imgs/logo.svg" alt="House Library">
            <h1>Redefinir Senha</h1>

            <form action="/recsenha" method="POST">
                
                <div class="textfield">
                    <label for="email">E-mail cadastrado</label>
                    <input type="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <div class="textfield">
                    <label for="senha">Nova senha</label>
                    <input type="password" name="senha" placeholder="Nova senha" required>
                </div>
                
                <button class="btn-login">Salvar Nova Senha</button>
            </form>
            
            <a href="/login">Voltar ao Login</a>
        </div>
    </div>
</div>
</body>