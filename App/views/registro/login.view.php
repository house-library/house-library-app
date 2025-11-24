<?php loadPartial('head', $viewData); ?>

<?php include __DIR__ . '/../vlibras.html'; ?>

    
<body>
    <form action="/login" method="POST">
    <div class="main-login">
        
        <div class="left-login">
            <h1 class="title-login">Bem vindo(a) de volta!</h1>
            <img src="/assets/imgs/login.svg" class="left-login-image" alt="Animação login">
        </div>

        <div class="right-login">
            <div class="card-login">
                <img src="/assets/imgs/logo.svg" alt="House Library">
                <h1>House Library</h1>
                
                <?php if (isset($errors['email'])): ?>
                    <div>
                        <?= $errors['email'] ?>
                    </div>
                <?php endif; ?>

                <div class="textfield">
                  <label for="email">E-mail</label>
                  <input type="email" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <a href="/recsenha" class="senha">Recuperar senha</a>
                
                <button type="submit" class="btn-login">Entrar</button>
                
                <a href="/cadastro" class="cadastro">Novo por aqui? Cadastre-se</a>

                <?php if (isset($errors['senha'])): ?> <p><?= $errors[
     'senha'
 ] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </form>
</body>
    
