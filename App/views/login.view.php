<?php loadPartial('head', $viewData); ?>

<?php include ("vlibras.html");?>

    
<body>
    <div class="main-login">
        
        <div class="left-login">
            <h1 class="title-login">Bem vindo(a) de volta!</h1>
            <img src="assets/imgs/login.svg" class="left-login-image" alt="Animação login">
        </div>
        <div class="right-login">
            <div class="card-login">
                <img src="assets/imgs/logo.svg" alt="House Library">
          <h1>House Library</h1>
                <div class="textfield">
                  <label for="usuario">Usuário</label>
                  <input type="text" name="usuario" placeholder="Email ou nome de usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type"password" name="senha" placeholder="Senha">
                </div>
                <a href="/controllers/recsenha.php" class="senha">Rescuperar senha</a>
                <button class="btn-login">Entrar</button>
                <a href="/controllers/cadastro.php" class="cadastro">Novo por aqui? Cadastre-se</a>
          </div>
        </div>
    </div>
</body>

    
